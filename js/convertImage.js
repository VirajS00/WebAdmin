/**
 * Convert a base64 string in a Blob according to the data and contentType.
 * 
 * @param b64Data {String} Pure base64 string without contentType
 * @param contentType {String} the content type of the file i.e (image/jpeg - image/png - text/plain)
 * @param sliceSize {Int} SliceSize to process the byteCharacters
 * @see http://stackoverflow.com/questions/16245767/creating-a-blob-from-a-base64-string-in-javascript
 * @return Blob
 */
 function b64toBlob(b64Data, contentType, sliceSize) {
    contentType = contentType || '';
    sliceSize = sliceSize || 512;

    let byteCharacters = atob(b64Data);
    let byteArrays = [];

    for (let offset = 0; offset < byteCharacters.length; offset += sliceSize) {
        let slice = byteCharacters.slice(offset, offset + sliceSize);

        let byteNumbers = new Array(slice.length);
        for (let i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }

        let byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
    }

  let blob = new Blob(byteArrays, {type: contentType});
  return blob;
}


const file = document.querySelector('#user_image');
const inputLabel = document.querySelector('#file_input_label');

const id = document.querySelector('#id');

const submit_button = document.querySelector('#sub_button');

user_image.addEventListener('change', () => {
    inputLabel.textContent = file.files[0].name;
});

submit_button.addEventListener('click', e => {
    if(file.files.length > 0) {
        let src = URL.createObjectURL(file.files[0]);

        let user_image = new Image();
        user_image.src = src;

        let user_image1 = new Image();
        user_image1.src = src;

        let canvas = document.createElement('canvas');
        let ctx = canvas.getContext("2d");

        let canvas1 = document.createElement('canvas');
        let ctx1 = canvas1.getContext("2d");

        user_image.onload = function() {
            let desired_width = 1000;

            let ratio = parseFloat(user_image.width) / parseFloat(user_image.height);
            let new_width, new_height;
            if(ratio > 1) {
                new_width = desired_width;
                new_height = desired_width/ratio;
            } else if (ratio == 1) {
                new_width = desired_width;
                new_height = desired_width;
            } else {
                new_width = desired_width * ratio;
                new_height = desired_width;
            }

            
            canvas.width = new_width;
            canvas.height = new_height;

            canvas1.width = new_width;
            canvas1.height = new_height;


            ctx.drawImage(user_image, 0, 0, user_image.width, user_image.height, 0, 0, new_width, new_height);
            ctx1.drawImage(user_image1, 0, 0, user_image.width, user_image.height, 0, 0, new_width, new_height);

            //convert canvas to webP and jpeg
            let WebpImg = canvas.toDataURL("image/webp");
            let JpegImg = canvas1.toDataURL("image/jpeg");

            let block = WebpImg.split(";");
            let realData = block[1].split(",")[1];

            let blockJ = JpegImg.split(";");
            let realDataJ = blockJ[1].split(",")[1];

            let blobWebp = b64toBlob(realData, 'image/webp');
            let blobJpeg = b64toBlob(realDataJ, 'image/jpeg');
            
            const fd = new FormData();

            fd.append('jpg_img', blobJpeg);
            fd.append('webp_img', blobWebp);
            fd.append('id', id.value);

            document.querySelector('.loader-container').style.display = 'flex';

            fetch('php/uploadImage.php', {
                method: 'POST',
                body: fd
            }).then(res => {
                if (!res.ok) {
					throw new Error(response);
				}
				return res.text();
            }).then(text => {
				if(text === 'sucess') {
                    document.querySelector('.success').textContent = 'success';
                    document.querySelector('.loader-container').style.display = 'none';
                    document.querySelector('.success').style.opacity = '1';
                    inputLabel.textContent = 'Select Image';

                    setTimeout(() => {
                        document.querySelector('.success').style.opacity = '0';
                    }, 2000);
                } else if (text === 'error') {
                    document.querySelector('.error').textContent = 'error';
                    document.querySelector('.loader-container').style.display = 'none';
                    document.querySelector('.error').style.opacity = '1';
                    inputLabel.textContent = 'Select Image';

                    setTimeout(() => {
                        document.querySelector('.error').style.opacity = '0';
                    }, 2000);
                }

                console.log(text);
			});
        }
    } else {
        document.querySelector('.error').style.opacity = '1';
        document.querySelector('.error').textContent = 'please select an image';

        setTimeout(() => {
            document.querySelector('.error').style.opacity = '0';
        }, 2000);
    }
});

const delForm = document.querySelectorAll('.img_del_form');

delForm.forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();
        if(confirm('are you sure you want to delete?')) {
            form.submit();
        } else {
            return;
        }
    })
})
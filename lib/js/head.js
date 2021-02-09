function ImageViewTrigger(input,name) {
    if (input.files && input.files[0]) {
        console.log('1');
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#'+name).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
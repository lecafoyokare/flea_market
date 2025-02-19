
document.querySelectorAll('.deco-file input[type=file]').forEach(function(){
	this.addEventListener('change',function(e){
		let parent = e.target.closest('.deco-file')
		parent.querySelector('.file-names').innerHTML=''
		for (file of e.target.files) {
			parent.querySelector('.file-names').insertAdjacentHTML('beforeend',file.name+"<br>");
		}
	})
})

document.querySelectorAll('.deco-file input[type=file]').forEach(function(){
    this.addEventListener('change', function(e){
        let parent = e.target.closest('.deco-file');
        
        for (file of e.target.files) {
            if (file.type.startsWith('image/')) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('profile-img').src = event.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    });
});
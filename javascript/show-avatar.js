document.querySelector('input[name="image"]').addEventListener('change', function(event) {
  const file = event.target.files[0];
  const previewImage = document.getElementById('preview-img');
  const previewImageBton = document.querySelector('.chooseFile');

  const reader = new FileReader();
  reader.onloadend = function() {
    previewImage.src = reader.result;
    previewImage.style.display = "block";
    previewImageBton.style.marginTop = "11px";
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    previewImage.src = "";
  }
});

function myFunction() {
    var element = document.getElementById("notification");
    element.classList.toggle("notificationActive");
}

function accountSetting() {
    var element = document.getElementById("accountController");
    element.classList.toggle("notificationActive");
  }
  
  function showPreview(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("bg-preview");
      preview.src = src;
      preview.style.display = "block";
      document.querySelector('.uploadCancelSubmitShow').style.display = "block";
      document.querySelector('.addCoverPhoto').style.display = "none";
    }
  }
  
  function uploadCancel(event){
    event.preventDefault();
    var preview = document.getElementById("bg-preview");
    preview.src = '';
    preview.style.display = "none";
    document.querySelector('.uploadCancelSubmitShow').style.display = "none";
    document.querySelector('.addCoverPhoto').style.display = "block";
  }
  
  function showPrsonalPhoto(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("photo-preview");
      preview.src = src;
    preview.style.display = "block";
    document.querySelector('.photoUploadCancelSubmitShow').style.display = "block";
  }
}

function photoUploadCancel(event){
  event.preventDefault();
  var preview = document.getElementById("photo-preview");
  preview.src = '';
  preview.style.display = "none";
  document.querySelector('.photoUploadCancelSubmitShow').style.display = "none";
}

function friendRemoveFunc(event) {
  event.preventDefault();
  document.querySelector(".friendRemove").classList.toggle("notificationActive");
}
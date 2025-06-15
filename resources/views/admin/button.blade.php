<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
<div >
  <button class="btn btn-primary" 
          type="button" 
          data-bs-toggle="offcanvas" 
          data-bs-target="#offcanvasProfile" 
          aria-controls="offcanvasProfile" 
          id="profileLink">
     View Profile
  </button>
</div>


<!-- Offcanvas -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasProfile" aria-labelledby="offcanvasProfileLabel">
  <div class="offcanvas-header border-bottom">
    <h4 id="offcanvasProfileLabel">Profile</h4>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body" id="offcanvasProfileBody">
    <!-- Loaded profile content goes here -->
  </div>
</div>




  <script>
document.addEventListener('DOMContentLoaded', () => {
  const offcanvasProfile = document.getElementById('offcanvasProfile');
  const profileBody = document.getElementById('offcanvasProfileBody');

  offcanvasProfile.addEventListener('show.bs.offcanvas', () => {
    // Show loading indicator
    profileBody.innerHTML = '<div class="text-center">Loading...</div>';

    // Fetch the profile page content
    fetch('adminpro')
      .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.text();
      })
      .then(html => {
        // Here you can parse and insert the relevant part of the profile page,
        // or just insert all HTML if your profile page is partial (no full <html> tag).
        profileBody.innerHTML = html;
      })
      .catch(error => {
        profileBody.innerHTML = `<div class="text-danger">Failed to load profile. Please try again later.</div>`;
        console.error('Error loading profile:', error);
      });
  });
});
</script>
</body>
</html> 
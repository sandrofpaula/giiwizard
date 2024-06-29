<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Font Awesome Icon List</title>
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }
    .icon-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    .icon-item {
      width: 120px;
      text-align: center;
    }
    .icon-item i {
      font-size: 24px;
    }
  </style>
</head>
<body>
  <h1>Font Awesome Icons</h1>
  <div class="icon-grid" id="iconGrid">
    <!-- Icons will be populated here by JavaScript -->
  </div>

  <script>
    const icons = [
      'fa-search', 'fa-home', 'fa-envelope', 'fa-heart', 'fa-star', 'fa-user', 'fa-camera', 'fa-cog', 'fa-trash', 
      'fa-pencil-alt', 'fa-facebook', 'fa-twitter', 'fa-linkedin', 'fa-github', 'fa-address-book', 'fa-anchor', 
      'fa-bell', 'fa-bicycle', 'fa-binoculars', 'fa-birthday-cake', 'fa-bolt', 'fa-book', 'fa-bookmark', 'fa-briefcase', 
      'fa-bug', 'fa-building', 'fa-bullhorn', 'fa-bullseye', 'fa-bus', 'fa-calculator', 'fa-calendar', 'fa-camera-retro', 
      'fa-car', 'fa-certificate', 'fa-check', 'fa-check-circle', 'fa-check-square', 'fa-child', 'fa-cloud', 'fa-cloud-download', 
      'fa-cloud-upload', 'fa-coffee', 'fa-cog', 'fa-cogs', 'fa-columns', 'fa-comment', 'fa-comment-alt', 'fa-comments', 
      'fa-compass', 'fa-credit-card', 'fa-cube', 'fa-cubes', 'fa-cut', 'fa-database', 'fa-desktop', 'fa-download', 
      'fa-edit', 'fa-ellipsis-h', 'fa-ellipsis-v', 'fa-envelope-open', 'fa-envelope-square', 'fa-eraser', 'fa-exclamation', 
      'fa-exclamation-circle', 'fa-exclamation-triangle', 'fa-external-link', 'fa-external-link-alt', 'fa-eye', 'fa-eye-dropper', 
      'fa-eye-slash', 'fa-fast-backward', 'fa-fast-forward', 'fa-fax', 'fa-female', 'fa-fighter-jet', 'fa-file', 'fa-file-alt', 
      'fa-file-archive', 'fa-file-audio', 'fa-file-code', 'fa-file-excel', 'fa-file-image', 'fa-file-pdf', 'fa-file-powerpoint', 
      'fa-file-video', 'fa-file-word', 'fa-film', 'fa-filter', 'fa-fire', 'fa-fire-extinguisher', 'fa-flag', 'fa-flag-checkered', 
      'fa-flask', 'fa-folder', 'fa-folder-open', 'fa-frown', 'fa-futbol', 'fa-gamepad', 'fa-gavel', 'fa-gem', 'fa-gift', 
      'fa-glass-martini', 'fa-globe', 'fa-graduation-cap', 'fa-h-square', 'fa-handshake', 'fa-hashtag', 'fa-hdd', 'fa-heading', 
      'fa-headphones', 'fa-heart', 'fa-heartbeat', 'fa-history', 'fa-home', 'fa-hospital', 'fa-hourglass', 'fa-id-badge', 
      'fa-id-card', 'fa-image', 'fa-images', 'fa-inbox', 'fa-indent', 'fa-industry', 'fa-info', 'fa-info-circle', 
      'fa-key', 'fa-keyboard', 'fa-language', 'fa-laptop', 'fa-leaf', 'fa-lemon', 'fa-life-ring', 'fa-lightbulb', 'fa-link', 
      'fa-lira-sign', 'fa-list', 'fa-list-alt', 'fa-list-ol', 'fa-list-ul', 'fa-location-arrow', 'fa-lock', 'fa-lock-open', 
      'fa-magic', 'fa-magnet', 'fa-male', 'fa-map', 'fa-map-marker', 'fa-map-marker-alt', 'fa-map-pin', 'fa-map-signs', 
      'fa-medkit', 'fa-meh', 'fa-microphone', 'fa-microphone-alt', 'fa-microphone-slash', 'fa-minus', 'fa-minus-circle', 
      'fa-minus-square', 'fa-mobile', 'fa-mobile-alt', 'fa-money-bill', 'fa-money-bill-alt', 'fa-moon', 'fa-motorcycle', 
      'fa-mouse-pointer', 'fa-music', 'fa-newspaper', 'fa-object-group', 'fa-object-ungroup', 'fa-paint-brush', 'fa-paper-plane', 
      'fa-paperclip', 'fa-paragraph', 'fa-paste', 'fa-pause', 'fa-pause-circle', 'fa-paw', 'fa-pen', 'fa-pen-alt', 'fa-pen-fancy', 
      'fa-pen-nib', 'fa-pen-square', 'fa-pencil-alt', 'fa-pencil-ruler', 'fa-phone', 'fa-phone-slash', 'fa-phone-square', 
      'fa-phone-volume', 'fa-plane', 'fa-play', 'fa-play-circle', 'fa-plug', 'fa-plus', 'fa-plus-circle', 'fa-plus-square', 
      'fa-podcast', 'fa-poo', 'fa-portrait', 'fa-pound-sign', 'fa-power-off', 'fa-print', 'fa-procedures', 'fa-project-diagram', 
      'fa-puzzle-piece', 'fa-qrcode', 'fa-question', 'fa-question-circle', 'fa-quidditch', 'fa-quote-left', 'fa-quote-right', 
      'fa-random', 'fa-recycle', 'fa-redo', 'fa-redo-alt', 'fa-registered', 'fa-reply', 'fa-reply-all', 'fa-retweet', 'fa-ribbon', 
      'fa-road', 'fa-rocket', 'fa-rss', 'fa-rss-square', 'fa-ruble-sign', 'fa-ruler', 'fa-ruler-combined', 'fa-ruler-horizontal', 
      'fa-ruler-vertical', 'fa-rupee-sign', 'fa-save', 'fa-school', 'fa-screwdriver', 'fa-search', 'fa-search-minus', 
      'fa-search-plus', 'fa-seedling', 'fa-server', 'fa-share', 'fa-share-alt', 'fa-share-alt-square', 'fa-share-square', 
      'fa-shekel-sign', 'fa-shield-alt', 'fa-ship', 'fa-shipping-fast', 'fa-shoe-prints', 'fa-shopping-bag', 'fa-shopping-basket', 
      'fa-shopping-cart', 'fa-shower', 'fa-sign', 'fa-sign-in-alt', 'fa-sign-language', 'fa-sign-out-alt', 'fa-signal', 
      'fa-signature', 'fa-sitemap', 'fa-skull', 'fa-sliders-h', 'fa-smile', 'fa-smoking', 'fa-snowflake', 'fa-sort', 
      'fa-sort-alpha-down', 'fa-sort-alpha-up', 'fa-sort-amount-down', 'fa-sort-amount-up', 'fa-sort-down', 'fa-sort-numeric-down', 
      'fa-sort-numeric-up', 'fa-sort-up', 'fa-space-shuttle', 'fa-spider', 'fa-spinner', 'fa-splotch', 'fa-spray-can', 'fa-square', 
      'fa-square-full', 'fa-star', 'fa-star-and-crescent', 'fa-star-half', 'fa-star-of-david', 'fa-star-of-life', 'fa-step-backward', 
      'fa-step-forward', 'fa-stethoscope', 'fa-sticky-note', 'fa-stop', 'fa-stop-circle', 'fa-stopwatch', 'fa-store', 
      'fa-store-alt', 'fa-stream', 'fa-street-view', 'fa-strikethrough', 'fa-stroopwafel', 'fa-subscript', 'fa-subway', 'fa-suitcase', 
      'fa-suitcase-rolling', 'fa-sun', 'fa-superscript', 'fa-surprise', 'fa-swatchbook', 'fa-swimmer', 'fa-swimming-pool', 
      'fa-synagogue', 'fa-sync', 'fa-sync-alt', 'fa-syringe', 'fa-table', 'fa-table-tennis', 'fa-tablet', 'fa-tablet-alt', 
      'fa-tablets', 'fa-tachometer-alt', 'fa-tag', 'fa-tags', 'fa-tape', 'fa-tasks', 'fa-taxi', 'fa-teeth', 'fa-teeth-open', 
      'fa-terminal', 'fa-text-height', 'fa-text-width', 'fa-th', 'fa-th-large', 'fa-th-list', 'fa-theater-masks', 'fa-thermometer', 
      'fa-thermometer-empty', 'fa-thermometer-full', 'fa-thermometer-half', 'fa-thermometer-quarter', 'fa-thermometer-three-quarters', 
      'fa-thumbs-down', 'fa-thumbs-up', 'fa-thumbtack', 'fa-ticket-alt', 'fa-times', 'fa-times-circle', 'fa-tint', 'fa-tint-slash', 
      'fa-tired', 'fa-toggle-off', 'fa-toggle-on', 'fa-toolbox', 'fa-tooth', 'fa-torah', 'fa-torii-gate', 'fa-tractor', 'fa-trademark', 
      'fa-traffic-light', 'fa-train', 'fa-transgender', 'fa-transgender-alt', 'fa-trash', 'fa-trash-alt', 'fa-tree', 'fa-trophy', 
      'fa-truck', 'fa-truck-loading', 'fa-truck-monster', 'fa-truck-moving', 'fa-truck-pickup', 'fa-tshirt', 'fa-tty', 'fa-tv', 
      'fa-umbrella', 'fa-umbrella-beach', 'fa-underline', 'fa-undo', 'fa-undo-alt', 'fa-universal-access', 'fa-university', 
      'fa-unlink', 'fa-unlock', 'fa-unlock-alt', 'fa-upload', 'fa-user', 'fa-user-alt', 'fa-user-alt-slash', 'fa-user-astronaut', 
      'fa-user-check', 'fa-user-circle', 'fa-user-clock', 'fa-user-cog', 'fa-user-edit', 'fa-user-friends', 'fa-user-graduate', 
      'fa-user-injured', 'fa-user-lock', 'fa-user-md', 'fa-user-minus', 'fa-user-ninja', 'fa-user-nurse', 'fa-user-plus', 
      'fa-user-secret', 'fa-user-shield', 'fa-user-slash', 'fa-user-tag', 'fa-user-tie', 'fa-user-times', 'fa-users', 'fa-users-cog', 
      'fa-utensil-spoon', 'fa-utensils', 'fa-vector-square', 'fa-venus', 'fa-venus-double', 'fa-venus-mars', 'fa-vial', 
      'fa-vials', 'fa-video', 'fa-video-slash', 'fa-vihara', 'fa-voicemail', 'fa-volleyball-ball', 'fa-volume-down', 'fa-volume-mute', 
      'fa-volume-off', 'fa-volume-up', 'fa-vote-yea', 'fa-vr-cardboard', 'fa-walking', 'fa-wallet', 'fa-warehouse', 'fa-water', 
      'fa-wave-square', 'fa-weight', 'fa-weight-hanging', 'fa-wheelchair', 'fa-wifi', 'fa-wind', 'fa-window-close', 'fa-window-maximize', 
      'fa-window-minimize', 'fa-window-restore', 'fa-wine-bottle', 'fa-wine-glass', 'fa-wine-glass-alt', 'fa-won-sign', 'fa-wrench', 
      'fa-x-ray', 'fa-yen-sign', 'fa-yin-yang'
    ];

    const iconGrid = document.getElementById('iconGrid');
    icons.forEach(iconClass => {
      const iconItem = document.createElement('div');
      iconItem.className = 'icon-item';
      iconItem.innerHTML = `<i class="fas ${iconClass}"></i><br>${iconClass}`;
      iconGrid.appendChild(iconItem);
    });
  </script>
  <i class="fa-brands fa-facebook"></i> 
</body>
</html>
<!-- <i class="fa-brands fa-facebook"></i> -->
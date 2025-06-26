// RTl & Ltr
$('<ul class="custom-theme"><li class="demo-li"><a href="../index.php" target="_blank">Front end</a></li><li class="btn-rtl">RTL</li><li class="btn-dark-setting">Dark</li></ul>').appendTo($('body'));
$(document).ready(function () {
  // Check stored preferences
  if (localStorage.getItem("rtlMode") === "enabled") {
      $("html").attr("dir", "rtl");
      $("body").addClass("rtl");
      $('.btn-rtl').addClass("rtl").text("LTR");
  }

  if (localStorage.getItem("darkMode") === "enabled") {
      $("body").addClass("dark");
      $('.btn-dark-setting').addClass("dark").text("Light");
  }

  // Toggle RTL Mode
  $('.btn-rtl').on('click', function () {
      $(this).toggleClass('rtl');
      $("html").attr("dir", $(this).hasClass('rtl') ? "rtl" : "");
      $("body").toggleClass("rtl");

      if ($(this).hasClass('rtl')) {
          $(this).text("LTR");
          localStorage.setItem("rtlMode", "enabled");
      } else {
          $(this).text("RTL");
          localStorage.removeItem("rtlMode");
      }
  });

  // Toggle Dark Mode
  $('.btn-dark-setting').on('click', function () {
      $(this).toggleClass('dark');
      $("body").toggleClass("dark");

      if ($(this).hasClass('dark')) {
          $(this).text("Light");
          localStorage.setItem("darkMode", "enabled");
      } else {
          $(this).text("Dark");
          localStorage.removeItem("darkMode");
      }
  });
});


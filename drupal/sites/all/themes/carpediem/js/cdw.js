$(document).ready(
		function () {
		  if($('#edit-taxonomy-1').get(0)) {
        switchHeaderPic($('#edit-taxonomy-1')[0][$('#edit-taxonomy-1').get(0).selectedIndex]);
			  $('#edit-taxonomy-1').change(function() {
			    switchHeaderPic($('#edit-taxonomy-1')[0][$('#edit-taxonomy-1').get(0).selectedIndex]);
			  });
		  }
		}
	);
function switchHeaderPic(item) {
$('#sampleHeaderPic').remove();
switch(item.innerHTML) {
    case "Blog":
      img = "admin";
      break;
    case "Contact":
      img = "contact";
      break;
    case "Now":
      img = "now";
      break;
    case "The Network":
      img = "network";
      break;
    case "Reports":
      img = "reports";
      break;
    case "What We Do":
      img = "what-we-do";
      break;
    case "Who We Are":
      img = "who-we-are";
      break;
    case "Who We Are":
      img = "who-we-are";
      break;
    case "New Visions":
      img = "new-visions";
      break;
    default:
      img = "admin";
      break;
  }
  $('#edit-taxonomy-1').after('<img id="sampleHeaderPic" width="328" height="62" align="middle" src="/sites/all/themes/carpediem/images/headers/header_' + img + '.jpg">');
}

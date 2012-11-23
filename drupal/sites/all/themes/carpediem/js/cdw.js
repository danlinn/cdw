$(document).ready(
		function () {
		  if($('#edit-taxonomy-1').get(0)) {
			  $('#edit-taxonomy-1').change(function() {
			    switchHeaderPic(this.selectedIndex);
			  });
			  switchHeaderPic($('#edit-taxonomy-1').get(0).selectedIndex);
		  }
		}
	);
function switchHeaderPic(sel) {
$('#sampleHeaderPic').remove();
  switch(sel) {
    case 2:
      img = "contact";
      break;
    case 3:
      img = "now";
      break;
    case 4:
      img = "network";
      break;
    case 5:
      img = "reports";
      break;
    case 6:
      img = "what-we-do";
      break;
    case 7:
      img = "who-we-are";
      break;
    default:
      img = "admin";
      break;
  }
  $('#edit-taxonomy-1').after('<img id="sampleHeaderPic" width="328" height="62" align="middle" src="/sites/carpediemwest.org/files/headers/header_' + img + '.jpg">');
}

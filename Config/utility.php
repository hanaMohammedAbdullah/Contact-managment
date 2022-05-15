<?php
// error_reporting(0);
function  render_table($array)
{

  $html = '<div >';
  $html .= '<table class="mx-auto border  p-5" >';

  $html .= '<tr class="bg-primary text-white">';
  $html .= '<th>' . "#" . '</th>';
  $html .= '<th>' . "Name" . '</th>';
  $html .= '<th>' . "Phone" . '</th>';
  $html .= '<th>' . "Email" . '</th>';
  $html .= '<th>' . "Action" . '</th>';
  $html .= '</tr>';
  $num_row = 1;
  foreach ($array as $contact) {

    $html .= '<tr class="p-10">';
    $html .= '<td>' .  $num_row . '</td>';
    $html .= '<td>' . $contact->full_name . '</td>'
      . '<td>' . $contact->phone . '</td>'
      . '<td>' . $contact->email . '</td>';
    $html .= '<td>' . '  <div class="d-flex justify-content-evenly "> 
        <a   class="btn bg-primary  "  style="color:white !important;" href="index.php?p=contacts&id=' . $contact->id . '"   >
          <img   src="./Asset/Image/pencil-square.svg"  alt="pencile">
        </a>


        <a onclick="return confirm(`Are you sure?`)" class="btn bg-danger  "style="color:white !important;"  href="controllers/contacts-controller.php?typo=delete&id=' . $contact->id . '"   >
          <img   src="./Asset/Image/trash.svg"  alt="trash">
        </a>
        </div>' . '</td>';
    $html .= '</tr>';
    $num_row += 1;
  }
  // 
  $html .= '</table>';


  $html .= '</Div>';
  return $html;
}

?><script>
  function editing(e) {

    document.querySelectorAll('.model__edit__back'.add('active__model'));

  }

  function closeing() {
    document.querySelectorAll('.model__edit__back'.remove('active__model'))
  }
</script>
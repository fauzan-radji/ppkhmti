<?php
class Modal
{
  private $id;
  private $title;
  private $opening;
  private $content;
  private $closing;
  private $footer;

  public function __construct($id, $title, $footer)
  {
    $this->id = $id;
    $this->title = $title;
    $this->footer = $footer;
    $this->opening = "<div class='modal fade' id='$this->id' tabindex='-1' role='dialog' aria-labelledby='{$this->id}Title' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title'>$this->title</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>";
    $this->closing = "
      </div>
      <div class='modal-footer'>
        $this->footer
      </div>
    </div>
  </div>
</div>";

    return $this;
  }

  public function setContent($html)
  {
    $this->content = $html;
    return $this;
  }

  public function print()
  {
    $html = $this->opening . $this->content . $this->closing;
    echo $html;
    return $html;
  }

  public static function create($id, $title, $footer)
  {
    $modal = new Modal($id, $title, $footer);
    return $modal;
  }
}

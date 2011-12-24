<?php
  $this->load->view('includes/header');
  if(isset($main_content_view))
  {
    $this->load->view($main_content_view);
  }
  elseif(isset($main_content))
  {
    echo $main_content;
  }
  else
  {
    echo('<h1>Page under Construction</h1>');
  }
  $this->load->view('includes/footer');
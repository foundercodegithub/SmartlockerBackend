<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <meta name="keywords" content='<?= $keywords ?>'>
    <meta name="description" content='<?= $description ?>'>
    <?php echo '<link rel="canonical" href="' . base_url($this->uri->uri_string()) . '" />';
    $cookie_lang = $this->input->cookie('language', TRUE);
    $path = $is_rtl = "";
    if (!empty($cookie_lang)) {
        $language = get_languages(0, $cookie_lang, 0, 1);
        if (!empty($language)) {
            $path = ($language[0]['is_rtl'] == 1) ? 'rtl/' : "";
            $is_rtl =  ($language[0]['is_rtl'] == 1) ? true : false;
        }
    } else {
        /* read the default language */
        $lang = $this->config->item('language');
        $language = get_languages(0, $lang, 0, 1);
        if (!empty($language)) {
            $path = ($language[0]['is_rtl'] == 1) ? 'rtl/' : "";
            $is_rtl =  ($language[0]['is_rtl'] == 1) ? true : false;
        }
    }
    $data['is_rtl'] = $is_rtl;
    $this->load->view('front-end/' . THEME . '/include-css', $data); ?>
  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
  <!--  <style>-->
  <!--    .modal {-->
  <!--      display: none;-->
  <!--      position: fixed;-->
  <!--      z-index: 8;-->
  <!--      left: 0;-->
  <!--      top: 0;-->
  <!--      width: 100%;-->
  <!--      height: 100%;-->
  <!--      overflow: auto;-->
  <!--      background-color: rgb(0, 0, 0);-->
  <!--      background-color: rgba(0, 0, 0, 0.4);-->
  <!--    }-->
  <!--    .modal-content {-->
  <!--      margin: 50px auto;-->
  <!--      border: 1px solid #999;-->
  <!--      width: 60%;-->
  <!--    }-->
  <!--    h2,-->
  <!--    p {-->
  <!--      margin: 0 0 20px;-->
  <!--      font-weight: 400;-->
  <!--      color: #999;-->
  <!--    }-->
  <!--    span {-->
  <!--      color: #666;-->
  <!--      display: block;-->
  <!--      padding: 0 0 5px;-->
  <!--    }-->
  <!--    form {-->
  <!--      padding: 25px;-->
  <!--      margin: 25px;-->
  <!--      box-shadow: 0 2px 5px #f5f5f5;-->
  <!--      background: #eee;-->
  <!--    }-->
  <!--    input,-->
  <!--    textarea {-->
  <!--      width: 90%;-->
  <!--      padding: 10px;-->
  <!--      margin-bottom: 20px;-->
  <!--      border: 1px solid #1c87c9;-->
  <!--      outline: none;-->
  <!--    }-->
  <!--    .contact-form button {-->
  <!--      width: 100%;-->
  <!--      padding: 10px;-->
  <!--      border: none;-->
  <!--      background: #1c87c9;-->
  <!--      font-size: 16px;-->
  <!--      font-weight: 400;-->
  <!--      color: #fff;-->
  <!--    }-->
  <!--    button:hover {-->
  <!--      background: #2371a0;-->
  <!--    }-->
  <!--    .close {-->
  <!--      color: #aaa;-->
  <!--      float: right;-->
  <!--      font-size: 28px;-->
  <!--      font-weight: bold;-->
  <!--    }-->
  <!--    .close:hover,-->
  <!--    .close:focus {-->
  <!--      color: black;-->
  <!--      text-decoration: none;-->
  <!--      cursor: pointer;-->
  <!--    }-->
  <!--    button.button {-->
        
  <!--      border-top: 10px;-->
  <!--      outline: none;-->
  <!--      border-radius: 5px;-->
  <!--      border-right: 10px;-->
  <!--      border-left: 10px;-->
  <!--      border-bottom: #02274a 1px solid;-->
  <!--      padding: 0 0 3px 0;-->
  <!--      font-size: 16px;-->
        
  <!--      cursor: pointer;-->
  <!--    }-->
  <!--    button.button:hover {-->
  <!--      border-bottom: #a99567 1px solid;-->
  <!--      color: #a99567;-->
       
  <!--    }-->
  <!--    .container{  -->
  <!--      text-align: center;  -->
  <!--      border: 7px solid red;  -->
  <!--      width: 300px;  -->
  <!--      height: 300px;  -->
  <!--      padding-top: 100px;  -->
  <!--      }  -->

  <!--  </style>-->
</head>

<body id="body" data-is-rtl='<?= $is_rtl ?>'>
    <?php $this->load->view('front-end/' . THEME . '/header'); ?>
    <?php $this->load->view('front-end/' . THEME . '/pages/' . $main_page); ?>
    <?php $this->load->view('front-end/' . THEME . '/footer'); ?>
    <?php $this->load->view('front-end/' . THEME . '/include-script'); ?>
    
</body>

</html>
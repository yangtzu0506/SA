<!DOCTYPE html>
<html>
<?php session_start();
include "connect.php";
$searchtxt=$_GET["search"];
$labeltxt=$_GET["label"];

//超過一週未認證下架
date_default_timezone_set('Asia/Taipei'); //設定時區
$today = strtotime(date("Y-m-d H:i:s"));

echo $month;



?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>拾在安心校園失物招領系統</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="vendor/glightbox/css/glightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  </head>
  <body>
  <div class="page-holder">
      <!-- navbar-->
      <header class="header bg-white">
        <div class="container px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.php"><h3 class="fw-bold text-uppercase text-dark">拾在安心校園失物招領系統</h3></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                <!-- 使用者權限 索引列-->
               <?php if($_SESSION["level"]=='0'){ ?>                       
                <li class="nav-item"><a class="nav-link" href="index.php">拾獲貼文</a></li>
                <li class="nav-item"><a class="nav-link" href="find.php">尋物啟事清單</a></li>
                <li class="nav-item"><a class="nav-link active"  href="post.php">發布貼文</a></li>
              </ul>
              <ul class="navbar-nav ms-auto">               
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user me-1 text-gray fw-normal"></i><?php echo $_SESSION["name"];?></a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="#">個人化</a><a class="dropdown-item border-0 transition-link" href="login/logout.php">登出</a></div>
                </li>
              </ul>

              <!-- 管理者權限 索引列-->
              <?php }else if($_SESSION["level"]=='1'){ ?>
                  <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="index.php">拾獲物管理</a>
                </li>
                <li class="nav-item"><a class="nav-link" id="pagesDropdown" href="find.php">尋物啟事管理</a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle active" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">管理區</a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="confirm.php">貼文審核</a><a class="dropdown-item border-0 transition-link" href="post.php">代發貼文</a><a class="dropdown-item border-0 transition-link" href="end_case.php">下架區</a></div>
                </li>
              </ul>
              <ul class="navbar-nav ms-auto">               
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user me-1 text-gray fw-normal"></i><?php echo $_SESSION["name"];?></a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="login/logout.php">登出</a></div>
                </li>
              </ul>
                
              <?php }?>
            </div>
          </nav>
        </div>
      </header>
      <!--  Modal -->
      <div class="modal fade" id="productView" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center" style="background: url(img/product-5.jpg)" href="img/product-5.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-1.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-2.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a></div>
                <div class="col-lg-6">
                  <div class="p-4 my-md-4">
                    <ul class="list-inline mb-2">
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                    </ul>
                    <h2 class="h4">Red digital smartwatch</h2>
                    <p class="text-muted">$250</p>
                    <p class="text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                    <div class="row align-items-stretch mb-4 gx-0">
                      <div class="col-sm-7">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5"><a class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0" href="cart.html">Add to cart</a></div>
                    </div><a class="btn btn-link text-dark text-decoration-none p-0" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">貼文審核</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="">管理區</a></li>
                    <li class="breadcrumb-item active" aria-current="page">貼文審核</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="row mb-3 align-items-center">
          <div class="col-lg-6"><h2 class="h5 text-uppercase mb-4">待審核貼文</h2></div>
         
            <div class="col-lg-12 mb-5 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
              <script>
                 $(document).ready( function () {
                  $('#confirm').DataTable({info: false,
                    "order": [[ 3, "ASC" ]],
                    language: {
                    lengthMenu: "",
                    sProcessing: "處理中...",
                    sZeroRecords: "没有匹配结果",
                    sInfo: "目前有 _MAX_ 筆資料",
                    sInfoEmpty: "目前共有 0 筆紀錄",
                    sInfoFiltered: " ",
                    sInfoPostFix: "",
                    sSearch: "尋找:",
                    sUrl: "",
                    sEmptyTable: "尚未有資料紀錄存在",
                    sLoadingRecords: "載入資料中...",
                    sInfoThousands: ",",
                    oPaginate: {
                      sFirst: "首頁",
                      sPrevious: "上一頁",
                      sNext: "下一頁",
                      sLast: "末頁",
                    },
                    order: [[0, "desc"]],
                    oAria: {
                      sSortAscending: ": 以升序排列此列",
                      sSortDescending: ": 以降序排列此列",
                    },
                  }});
                  } ); 
                </script>
                <table class="table text-nowrap" id="confirm">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">貼文編號</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">物品名稱</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">遺失時間</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">遺失地點</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"> 審核 </strong></th>
                    </tr>
                  </thead>
                  <tbody class="border-0">
                  <?php
                if(isset($labeltxt)){
                $sql="select * from item where item_label like '%$labeltxt%' or item_name like '%$labeltxt%' order by item_time desc";
                }
	              else if($searchtxt!="")
	              {
                
                $sql="select * from item where item_name like '%$searchtxt%' or item_place like '%$searchtxt%' or item_text like '%$searchtxt%' or item_time like '%$searchtxt%' order by item_time desc";
        
		            }
	              else
	              {
              
                $sql="select * from item order by item_time DESC";
		            }
                $delete_item = "delete * from item order by item_time desc";
               
                $rs=mysqli_query($link,$sql);
	              //$rs=mysql_query($sql,$link);
                
                

	              ?>
                <div class="row">
                  <!-- PRODUCT-->
                  <?php
                    while($record=mysqli_fetch_row($rs))
                    {
                      $id=$record[0]; 
                      $name=$record[1];
                      $text=$record[2];
                      $time=$record[3];
                      $place=$record[4];
                      $label=$record[5];
                      $img=$record[6];
                      $confirm = $record[7];
                      //算時間
                      $secondDay=strtotime($time);
                      $month=($today-$secondDay)/3600/24/30;
                      $day=($today-$secondDay)/3600/24;

                      if($day>7 && $confirm==0){
                        $sql_day="delete from item where item_id=$id";
                        mysqli_query($link,$sql_day);
                      }
                      else if($month>3){
                        $sql_day="delete from item where item_id=$id";
                        mysqli_query($link,$sql_day);
                      }else if($month >1 && $confirm==1){
                        $sql_day="update item set item_confirm = 2 where item_id=$id";
                        mysqli_query($link,$sql_day);
                      }
                      ?>
                      <?php if($confirm==0){ ?>

             <!-- 詳細資料彈窗 -->
        <div class="modal fade" id="<?php echo $name?>" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center" style="background: url(<?php echo $img?>)" href="<?php echo $img?>" data-gallery="gallery1" data-glightbox="<?php echo $name?>"></a></div>
                <div class="col-lg-6">
                  <div class="p-4 my-md-4">
                    
                    <h2 class="h4"><?php echo $name?></h2>
                    <p class="text-muted"><?php echo $text?></p>
                    <p class="text-mb mb-4">遺失時間：<?php echo $time?></p>
                    <div class="row align-items-stretch mb-4 gx-0">
                      <div class="col-sm-7">
                      <p class="text-mb mb-4">遺失地點：<?php echo $place?></p>
                      <p class="text-mb mb-4">標籤：<?php echo $label?></p>
                      </div>
                    </div>
                    <div id="button"><center><a class="btn btn-sm btn-outline-dark" href="confirm/confirm_update.php?id=<?php echo $id ?>">認證</a><a class="btn btn-sm btn-outline-dark" href="confirm/confirm_delete.php?id=<?php echo $id ?>">刪除</a><center></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

                    <tr>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small"><?php echo $id?></p>
                      </td>
                      <th class="ps-0 py-3 border-light" scope="row">
                        <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="#"><img src="<?php echo $img?>" alt="..." width="70"/></a>
                          <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.html"><?php echo $name?></a></strong></div>
                        </div>
                      </th>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small"><?php echo $time?></p>
                      </td>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small"><?php echo $place?></p>
                      </td>
                      <td class="p-3 align-middle border-light">
                      <ul class='mb-0 list-inline'>
                        <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href="#<?php echo $name?>" data-bs-toggle='modal'>審核</a></li>
                      </ul>
                      </td>
                    </tr>
                    <?php } ?>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- CART NAV-->
             
            </div>
            <!-- ORDER TOTAL-->
          </div>
        </section>
      </div>
      <footer class="bg-dark text-white" align=center>
        <div class="container py-4">
          <div class="row py-5">
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3" style="font-size:25px">校園連結</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="http://u9.tku.edu.tw/" style="font-size:20px">優久大學聯盟</a></li>
                <li><a class="footer-link" href="https://www.fju.edu.tw/article.jsp?articleID=34" style="font-size:18px">公文自動化 &amp; ODF</a></li>
                <li><a class="footer-link" href="https://www.fju.edu.tw/article.jsp?articleID=22" style="font-size:18px">高教深耕計畫 &amp; 開放式課程</a></li>
                <li><a class="footer-link" href="https://www.fju.edu.tw/article.jsp?articleID=21" style="font-size:18px">WebMail &amp; LDAP</a></li>
                <li><a class="footer-link" href="http://www.fju.edu.tw/resource.jsp?labelID=27" style="font-size:18px">職涯服務 &amp; 學生會</a></li>

              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3" style="font-size:25px">公告資訊</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="http://control.fju.edu.tw/" style="font-size:18px">內部控制專區</a></li>
                <li><a class="footer-link" href="https://www.fju.edu.tw/fee/1_1.html" style="font-size:18px">校務財務資訊專區</a></li>
                <li><a class="footer-link" href="https://www.fju.edu.tw/article.jsp?articleID=20" style="font-size:18px">政府公告專區</a></li>
                <li><a class="footer-link" href="http://life.dsa.fju.edu.tw/scholarship.html" style="font-size:18px">獎助學金</a></li>
                <li><a class="footer-link" href="http://www.secretariat.fju.edu.tw/article.jsp?articleID=8" style="font-size:18px">行事曆</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3" style="font-size:25px">快速連結</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="http://irb.rdo.fju.edu.tw/" style="font-size:18px">人體研究IRB</a></li>
                <li><a class="footer-link" href="https://researchinfo.fju.edu.tw/" style="font-size:18px">學術統計資料網</a></li>
                <li><a class="footer-link" href="http://activity.dsa.fju.edu.tw/ActivityList.jsp" style="font-size:18px">活動報名系統</a></li>
                <li><a class="footer-link" href="https://www.fju.edu.tw/article.jsp?articleID=5" style="font-size:18px">輔大媒體家族</a></li>
                <li><a class="footer-link" href="http://www.cre.fju.edu.tw/" style="font-size:20px">研究倫理中心</a></li>

              </ul>
            </div>
          </div>
          <div class="border-top pt-4" style="border-color: #1d1d1d !important">
            <div class="row">
              <div class="col-md-6 text-center text-md-start">
                <p class="small text-muted mb-0">&copy; 2021 All rights reserved.</p>
              </div>
              <div class="col-md-6 text-center text-md-end">
                <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor" href="https://bootstrapious.com/p/boutique-bootstrap-e-commerce-template">Bootstrapious</a></p>
                <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- JavaScript files-->
      <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/glightbox/js/glightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/swiper/swiper-bundle.min.js"></script>
      <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
      <script src="js/front.js"></script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
  </body>
</html>
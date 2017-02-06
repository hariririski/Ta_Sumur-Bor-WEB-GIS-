 <div class="col-lg-6">
            <!--testimonial start-->
            <div class="about-testimonial boxed-style about-flexslider ">
              <section class="slider wow fadeInRight">
                <div class="flexslider">
                  <ul class="slides about-flex-slides">
                    <?php
                  include'maps/db.php';
                  $i=1;
                  $tampil = "SELECT COUNT(id_sumur_bor),NAMA_KABUPATEN, logo FROM `data_sumur_bor`,kabupaten WHERE kabupaten.Id_kabupaten=data_sumur_bor.kabupaten GROUP BY data_sumur_bor.kabupaten";
                  $sql = mysqli_query($con,$tampil);
                  while($data = mysqli_fetch_array($sql))
                   {
					 echo'
					<li>
                      <div class="about-testimonial-image ">
                        <img alt="" src="'.$data['logo'].'" width="100%">
                      </div>
                      <a class="about-testimonial-author" href="#">
                        '.$data['NAMA_KABUPATEN'].'
                      </a>
                      <span class="about-testimonial-company">
                      
                      </span>
                      <div class="about-testimonial-content">
                        <p ><font size="5">
                        '.$data['COUNT(id_sumur_bor)'].' Sumur Bor
                        </font></p>
                      </div>
                    </li>
					';
                   }
                  
              ?>
                  </ul>
                </div>
              </section>
            </div>
            <!--testimonial end-->
          </div>
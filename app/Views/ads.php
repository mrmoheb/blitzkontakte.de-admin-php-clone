  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <?php foreach($ads as $ad){?>
          <!-- Card --->
          <div class="col-lg-4">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><?=$ad->title?></h5>
              </div>
              <div class="card-body">
                <p class="card-text"><?=$ad->details?></p>
                <ul style="list-style:none;padding:0">
                  <li><b>Address: </b> <?=$ad->address?></li>
                  <li><b>Ad Type(Request/Offer): </b> <?=$ad->isOffer===1?"Offer":"Request"?></li>
                  <li><b>Commercial/Private: </b> <?=$ad->blitzanzeigen===1?"Private":"Commercial"?></li>
                  <li><b>Time To End: </b> <?=$ad->timeToEnd?></li>
                  <li><b>Price: </b> <?=$ad->price?></li>
                  <li><b>Category Name: </b> <?=$ad->categoryName?></li>
                  <li><b>User Full Name: </b> <?=$ad->firstName?> <?=$ad->lastName?></li>
                  <li><b>Current User Rating: </b> <?=$ad->rating?></li>
                </ul>
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <?php foreach($ad->images as $image){?>
                      <div class="col-sm-4">
                        <a href="<?=$image?>" data-toggle="lightbox" data-title="<?=$ad->title?>" data-gallery="gallery">
                          <img src="<?=$image?>" class="img-fluid mb-2" alt="<?=$ad->title?>"/>
                        </a>
                      </div>
                      <?php }?>
                    </div>
                  </div> 
                </div>
                <a href="<?=base_url('ads/approve/'.$ad->adId)?>" class="btn btn-success">Approve</a>
                <a href="<?=base_url('ads/decline/'.$ad->adId)?>" class="btn btn-danger">Reject</a>
              </div>
            </div>
          </div>
          <!---End of Card -->
          <?php }?>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
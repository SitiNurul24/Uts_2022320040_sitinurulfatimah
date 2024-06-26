<?php
$selected = "selected='selected'";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Ruangan
        <small>Add, Edit, Delete</small>
        <span class='pull-right'><a class="btn btn-primary" href="<?php echo base_url(); ?>addNewRoom"><i class="fa fa-plus" aria-hidden="true"></i> Buat Ruangan Baru</a></span>
      </h1>
    </section>
    <section class="content">
        <!-- <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addNewRoom"><i class="fa fa-plus" aria-hidden="true"></i> Add New Room</a>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Ruangan</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>roomListing" method="POST" id="searchList">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="input-group">
                                <select class="form-control input-sm" id="floorId" name="floorId">
                                  <option value="">Pilih Lantai</option>
                                  <?php
                                    if(!empty($floors))
                                    {
                                        foreach ($floors as $frs)
                                        {
                                            ?>
                                            <option value="<?php echo $frs->floorId ?>"
                                              <?php if($frs->floorId == $searchFloorId) { echo $selected; } ?>><?php echo $frs->floorCode." - ".$frs->floorName ?></option>
                                            <?php
                                        }
                                    }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="input-group">
                                <select class="form-control input-sm" id="sizeId" name="sizeId">
                                    <option value="">Pilih Ukuran Kamar</option>
                                    <?php
                                    if(!empty($roomSizes))
                                    {
                                        foreach ($roomSizes as $rs)
                                        {
                                            ?>
                                            <option value="<?php echo $rs->sizeId ?>"
                                              <?php if($rs->sizeId == $searchRoomSizeId) { echo $selected; } ?>>
                                                <?php echo $rs->sizeTitle ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="input-group">
                                <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm" placeholder="Search"/>
                                <div class="input-group-btn">
                                  <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                  <button class="btn btn-sm btn-default resetFilters"><i class="fa fa-refresh"></i></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Id</th>
                      <th>Nomor Ruangan</th>
                      <th>Ukuran Ruangan</th>
                      <th>Deskripsi Ruangan</th>
                      <th>Lantai Ruangan</th>
                      <th width="10%" class="text-center">Aksi</th>
                    </tr>
                    <?php
                    if(!empty($roomRecords))
                    {
                        foreach($roomRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->roomId ?></td>
                      <td><?php echo $record->roomNumber ?></td>
                      <td><?php echo $record->sizeTitle ?></td>
                      <td><?php echo $record->sizeDescription ?></td>
                      <td><?php echo $record->floorCode." - ".$record->floorName; ?></td>
                      <td class="text-center">
                          <a href="<?php echo base_url().'editOldRoom/'.$record->roomId; ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></a>
                          <a href="#" data-roomid="<?php echo $record->roomId; ?>" class="deleteRoom btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "roomListing/" + value);
            jQuery("#searchList").submit();
        });
        jQuery('.resetFilters').click(function(){
          $(this).closest('form').find("input[type=text], #sizeId, #floorId").val("");
        });
    });
</script>

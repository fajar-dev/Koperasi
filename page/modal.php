<!--modal tambah -->
<div class="modal fade" id="tambah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" method="POST">
            <div class="modal-body">
              <input type="hidden" value="<?php echo $_SESSION['id']?>" name="id">
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="Keterangan" name="ket" required>
                    </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="inputPassword3" placeholder="tanggal" name="tgl" required>
                    </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="inputPassword3" placeholder="jumlah" name="jml" required>
                    </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"><div></div></i> Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <!--modal tambah -->
<div class="modal fade" id="tambahnb">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" method="POST">
            <div class="modal-body">
              <input type="hidden" value="<?php echo $_SESSION['id']?>" name="id">
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="Keterangan" name="ket" required>
                    </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="inputPassword3" placeholder="tanggal" name="tgl" required>
                    </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="inputPassword3" placeholder="jumlah" name="jml" required>
                    </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"><div></div></i> Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--Modal Edit 
<div class="modal fade" id="edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="edit.php" method="get">
                      <?php
                        $id = $data['id']; 
                        $query_edit = mysqli_query($koneksi, "SELECT * FROM mhs WHERE id='$id'");
                        while ($row = mysqli_fetch_array($query_edit)) {  
                      ?>
            <div class="modal-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Penanggung jawab</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Penanggung jawab"  name="penanggung" required>
                  </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="Keterangan" name="ket" required>
                    </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="inputPassword3" placeholder="tanggal" name="tgl" required>
                    </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="inputPassword3" placeholder="jumlah" name="jml" required>
                    </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"><div></div></i> Simpan</button>
            </div>
                      <?php 
                        }
                      ?> 
            </form>
          </div>
          <!- /.modal-content ->
        </div>
        <!- /.modal-dialog ->
      </div>
      <!- /.modal-->
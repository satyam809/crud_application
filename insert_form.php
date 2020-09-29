
<div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Employee Form</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <form id="submit_form">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Enter Name" name="name" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control"  placeholder="Enter full address" name="address" required>
                </div>
                <div class="form-group">Male:
                  <input name="gender" id="genderM" value="M" required="" type="radio"> Female:
                  <input name="gender" id="genderF" value="F" type="radio">
                </div>
                <div class="form-group">
                  <select class="form-control"  name="designation" required>
                    <option disabled selected>Select your designation</option>
                    <option>Faller</option>
                    <option>Financial investigator</option>
                    <option>Systems programmer</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="date" class="form-control" name="age" required data-parsley-maxdate="01-01-2001">
                </div>
                <div class="form-group">
                  <label>Upload image</label>
                  <input type="file" class="form-control-file border photo" name="file" onchange="previewFile(this);" required>
                </div>
                <div class="form-group show_preview">
                  <img src="" class="rounded preview_img" alt="Cinque Terre" width="304" height="236">
                  <br><br>
                  <button type='button' class='btn btn-danger' onclick="hide_preview()">Delete</button>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit" id="submit">
              </form>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>
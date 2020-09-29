<div class="modal fade" id="myeditModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <br>
              <div id="update_message"></div>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              
              <form id="edit_submit_form">
                <div class="form-group">
                  <input type="text" name="update_id" id="update_id" hidden>
                  <input type="text" class="form-control" placeholder="Enter Name" id="update_name" name="name"  required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control"  placeholder="Enter full address" id="update_address" name="address" required>
                </div>
                <div class="form-group">Male:
                  <input name="gender"  value="M" type="radio" id="male">Female
                  <input name="gender"  value="F" type="radio" id="female">
                </div>
                <div class="form-group">
                  <select class="form-control" id="update_designation"  name="designation" required>
                    <!-- <option disabled selected>Select your designation</option> -->
                    <option value='Faller'>Faller</option>
                    <option value='Financial investigator'>Financial investigator</option>
                    <option value='Systems programmer'>Systems programmer</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="date" class="form-control" name="age" id="update_age" required data-parsley-maxdate="01-01-2001">
                </div>
                <div class="form-group">
                  <label>Upload image</label>
                  <input type="file" class="form-control-file border photo" name="file"  onchange="changepreviewFile(this);">
                </div>
                <div class="form-group show_preview">
                  <img src="" class="rounded preview_img" alt="Cinque Terre" width="304" height="236" id="fetch_photo">
                  <br><br>
                  <button type="button" class="btn btn-danger" onclick="hide_preview()">Delete</button>
                </div>
                <input type="submit" class="btn btn-primary" value="Update" id="update">
              </form>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>
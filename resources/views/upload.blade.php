<form method="POST" accept-charset="UTF-8" enctype="multipart/form-data">

    <div class="form-group">
        <label for="image">Upload Image to S3 Bucket</label>
        <input id="image" name="image" type="file">
    </div>
    
    <div class="form-group">
        <button type="submit" name="save_btn" class="btn btn-white btn-info btn-bold">
            <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
            Save
        </button>
    </div>

    {{ csrf_field() }}

</form>

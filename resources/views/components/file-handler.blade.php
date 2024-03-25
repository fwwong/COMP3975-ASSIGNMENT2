<div>
    <div>
        <form method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="action" value="InsertFile">
            <input type="file" name="csv_file">
            <input type="submit" value="Insert File Data">
        </form>
    </div>
</div>
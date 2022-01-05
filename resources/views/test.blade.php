<form method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name">
    <input type="file" name="profile_picture">
    <input type="submit">
</form>

<form action='/tasks/5' method='POST'>
    <!-- 직접 _method hidden 타입 추가 -->
    <input type="hidden" name="_method" value="PUT">
    <!-- @method 지시어를 사용하여 정의 -->
    @method("PUT")
</form>

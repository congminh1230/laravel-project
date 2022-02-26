<form method="POST" action="/admin/categories/store"  >
            @csrf
            <input type="text" name="name"/>
           <input type="hidden" name="_method" value="POST" />
           <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
           <input type="submit" value="Submit"/>
</form>  

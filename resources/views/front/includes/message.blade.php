
                                                    @if ($errors->any())
                         <div class="alert alert-light-danger" role="alert">
                            <button type="button" class="btn-close text-danger mr-negative-16" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


            


                    @if(Session::has('success_message'))
                         <div class="alert alert-light-success" role="alert">
                             {{ Session::get('success_message') }}
                            <button type="button" class="btn-close text-success mr-negative-16" data-bs-dismiss="alert" aria-hidden="true">×</button><strong></strong> <a href="javascript:void(0);" class="alert-link"></a></div>

                        @endif




                        @if(Session::has('error_message'))
    <div class="alert alert-light-danger" role="alert">
        {{ Session::get('error_message') }}
         <button style="border: none; background: none;" type="button" class="btn-close text-danger mr-negative-16" data-bs-dismiss="alert" aria-hidden="true">×</button>
    </div>
@endif

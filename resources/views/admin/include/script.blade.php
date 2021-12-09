<script src="{{asset('backend/')}}/lib/jquery/jquery.js"></script>
    <script src="{{asset('backend/')}}/lib/popper.js/popper.js"></script>
     {{-- text editor plagint --}}
     <script src="{{asset('backend/')}}/lib/medium-editor/medium-editor.js"></script>
     <script src="{{asset('backend/')}}/lib/summernote/summernote-bs4.min.js"></script>
     <script>
       $(function(){
         'use strict';
 
         // Inline editor
         var editor = new MediumEditor('.editable');
 
         // Summernote editor
         $('#summernote').summernote({
           height: 150,
           tooltip: false
         })
         $('#summernote2').summernote({
           height: 150,
           tooltip: false
         })
       });
     </script>
 {{-- text editor plagint --}}
    <script src="{{asset('backend/')}}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{asset('backend/')}}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="{{asset('backend/')}}/js/starlight.js"></script>

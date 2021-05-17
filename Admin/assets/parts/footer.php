        </div>

        <!--Footer-->
        <div class="footer">
          <p>&copy; Script Feather</p>
          <p>Content Management System</p>
        </div>
        <!--Footer End-->
      </section>
      <!--Content End-->
    </div>

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/validate.js"></script>
    <script src="./assets/summernote/summernote-lite.js"></script>
    <script>
      $('#summernote').summernote({
        placeholder: 'Your content here, master...',
        tabsize: 2,
        height: 500,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['view', ['codeview', 'help']]
        ]
      });
    </script>
  </body>
</html>

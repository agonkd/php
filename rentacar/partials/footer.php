<footer>
  <p>&copy; 2020 - All rights reserved</p>
</footer>
<script type="text/javascript">
  var $_POST = <?php echo json_encode($_POST); ?>;
  $(document).ready(function() {
    $($_POST['form']).parsley().on('field:validated', function() {
        var ok = $('.parsley-error').length === 0;
        $('.bs-callout-info').toggleClass('hidden', !ok);
        $('.bs-callout-warning').toggleClass('hidden', ok);
      })
      .on('form:submit', function() {
        return true; // Don't submit form for this demo
      });
  });
</script>
</body>

</html>
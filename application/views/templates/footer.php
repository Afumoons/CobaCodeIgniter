 <!-- Footer -->
 <footer class="footer bg-light">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                 <ul class="list-inline mb-2">
                     <li class="list-inline-item">
                         <a href="#">About</a>
                     </li>
                     <li class="list-inline-item">&sdot;</li>
                     <li class="list-inline-item">
                         <a href="#">Contact</a>
                     </li>
                     <li class="list-inline-item">&sdot;</li>
                     <li class="list-inline-item">
                         <a href="#">Terms of Use</a>
                     </li>
                     <li class="list-inline-item">&sdot;</li>
                     <li class="list-inline-item">
                         <a href="#">Privacy Policy</a>
                     </li>
                 </ul>
                 <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
             </div>
             <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                 <ul class="list-inline mb-0">
                     <li class="list-inline-item mr-3">
                         <a href="#">
                             <i class="fab fa-facebook fa-2x fa-fw"></i>
                         </a>
                     </li>
                     <li class="list-inline-item mr-3">
                         <a href="#">
                             <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                         </a>
                     </li>
                     <li class="list-inline-item">
                         <a href="https://www.instagram.com/wkwk_man/">
                             <i class="fab fa-instagram fa-2x fa-fw"></i>
                         </a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </footer>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
             </div>
         </div>
     </div>
 </div>

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Bootstrap core JavaScript -->
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <!-- <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 <!-- Custom Script -->
 <script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
 <script src="<?= base_url(); ?>assets/js/stylish-portfolio.min.js"></script>
 </body>

 </html>
<a href="#" class="floating-btn" title="Help" data-bs-toggle="modal" data-bs-target="#helpModal" aria-label="Open help dialog">
    <i class="bi bi-question-circle"></i>
</a>
<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content" style="background: #1b263b; color: #d4af37; border-radius: 1rem;">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="helpModalLabel">Help & Support</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="accordion" id="faqAccordion" role="region" aria-label="Frequently Asked Questions">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne"><button class="accordion-button collapsed text-gold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">How do I use the dashboard?</button></h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-light" style="background: #0d1b2a;">
                                The dashboard provides you with summary cards of your tasks, polls, votes, and notifications all in one place for quick access and management.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo"><button class="accordion-button collapsed text-gold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How to manage my tasks and polls?</button></h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-light" style="background: #0d1b2a;">
                                You can view, update, and track the progress of your assigned tasks. Polls allow you to participate and review poll results in the related sections.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree"><button class="accordion-button collapsed text-gold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How can I contact support?</button></h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-light" style="background: #0d1b2a;">
                                For further assistance, please reach out to our support team via the Contact Us page or use the chatbot for real-time help.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<footer class="bg-dark text-center text-lg-start text-white mt-5 pt-4 pb-3 border-top border-secondary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-start mb-3 mb-lg-0">
                <p class="mb-0 small" style="color:#d4af37;">&copy; <?php echo date('Y'); ?> Team_0001. All rights reserved.</p>
            </div>
            <div class="col-lg-6 text-center text-lg-end">
                <a href="#" class="text-gold me-3 text-decoration-none" aria-label="Facebook" title="Facebook"><i class="bi bi-facebook fs-5"></i></a>
                <a href="#" class="text-gold me-3 text-decoration-none" aria-label="Twitter" title="Twitter"><i class="bi bi-twitter fs-5"></i></a>
                <a href="#" class="text-gold me-3 text-decoration-none" aria-label="LinkedIn" title="LinkedIn"><i class="bi bi-linkedin fs-5"></i></a>
                <a href="#" class="text-gold text-decoration-none" aria-label="GitHub" title="GitHub"><i class="bi bi-github fs-5"></i></a>
            </div>
        </div>
    </div>
</footer>
<style>
    .text-gold {
        color: #d4af37 !important;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .text-gold:hover,
    .text-gold:focus {
        color: #fff !important;
        text-decoration: none;
    }

    .btn-close-white {
        filter: brightness(0) invert(1);
        transition: filter 0.3s ease;
    }

    .btn-close-white:hover {
        filter: brightness(0) invert(0.85);
    }

    .floating-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background-color: #d4af37;
        color: #0d1b2a;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        text-align: center;
        line-height: 56px;
        font-size: 26px;
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.6);
        transition: background-color 0.3s ease, transform 0.3s ease;
        z-index: 1050;
        cursor: pointer;
    }

    .floating-btn:hover,
    .floating-btn:focus {
        background-color: #b89523;
        transform: scale(1.1);
        color: #fff;
        outline: none;
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.8);
    }

    .accordion-body::-webkit-scrollbar {
        width: 8px;
    }

    .accordion-body::-webkit-scrollbar-track {
        background: #0d1b2a;
        border-radius: 4px;
    }

    .accordion-body::-webkit-scrollbar-thumb {
        background-color: #d4af37cc;
        border-radius: 4px;
        border: 2px solid #0d1b2a;
    }

    @media (max-width: 576px) {
        .accordion-button {
            font-size: 1rem;
        }

        .modal-title {
            font-size: 1.3rem;
        }

        .accordion-body {
            font-size: 0.9rem;
        }
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
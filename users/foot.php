    </div>
    </div>
    </div>
    <!-- Floating Button -->
    <a href="#" class="floating-btn" title="Help" data-bs-toggle="modal" data-bs-target="#helpModal" aria-label="Open help dialog">
        <i class="bi bi-question-circle"></i>
    </a>

    <!-- Help Modal -->
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
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed text-gold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    How do I use the dashboard?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-light" style="background: #0d1b2a;">
                                    The dashboard provides you with summary cards of your tasks, polls, votes, and notifications all in one place for quick access and management.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed text-gold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How to manage my tasks and polls?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-light" style="background: #0d1b2a;">
                                    You can view, update, and track the progress of your assigned tasks. Polls allow you to participate and review poll results in the related sections.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed text-gold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    How can I contact support?
                                </button>
                            </h2>
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
    <style>
        /* Floating Help Button Styles */
        /* Gold accent text */
        .text-gold {
            color: #d4af37 !important;
            font-weight: 600;
        }

        /* Accordion buttons */
        .accordion-button {
            background-color: transparent;
            color: #d4af37;
            font-weight: 700;
            font-size: 1.1rem;
            border: none;
            box-shadow: none;
            transition: background-color 0.3s ease, color 0.3s ease;
            padding-left: 1.25rem;
        }

        .accordion-button:not(.collapsed) {
            background-color: rgba(212, 175, 55, 0.15);
            color: #fff;
            font-weight: 800;
            border-radius: 0.5rem;
        }

        .accordion-button::after {
            filter: brightness(1) invert(0.9);
            transition: transform 0.3s ease;
        }

        .accordion-button.collapsed::after {
            filter: brightness(1) invert(0.6);
        }

        .accordion-button:focus {
            outline: 2px solid #d4af37;
            outline-offset: 2px;
            box-shadow: none;
        }

        /* Accordion body */
        .accordion-body {
            background-color: #0d1b2a;
            color: #e0d9b6;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0 0 0.5rem 0.5rem;
            padding: 1rem 1.5rem;
            user-select: text;
        }

        /* Modal header */
        .modal-header {
            border-bottom: none;
            padding-bottom: 0;
        }

        /* Modal title */
        .modal-title {
            font-weight: 700;
            font-size: 1.5rem;
            color: #d4af37;
        }

        /* Modal content */
        .modal-content {
            background: #1b263b;
            border-radius: 1rem;
            border: none;
            box-shadow: 0 8px 24px rgba(212, 175, 55, 0.6);
        }

        /* Modal footer */
        .modal-footer {
            border-top: none;
            padding-top: 1rem;
        }

        /* Close button */
        .btn-close-white {
            filter: brightness(0) invert(1);
            transition: filter 0.3s ease;
        }

        .btn-close-white:hover {
            filter: brightness(0) invert(0.85);
        }

        /* Floating help button */
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

        /* Scrollbar for accordion body if required */
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

        /* Responsive font size for modal content */
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

        .floating-btn:hover {
            background-color: #b89523;
            transform: scale(1.1);
            color: #fff;
        }
    </style>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.getElementById("sidebar");
            const mobileMenuBtn = document.getElementById("mobileMenuBtn");
            const sidebarCloseBtn = document.getElementById("sidebarCloseBtn");

            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener("click", function() {
                    sidebar.classList.toggle("active");
                });
            }

            if (sidebarCloseBtn) {
                sidebarCloseBtn.addEventListener("click", function() {
                    sidebar.classList.remove("active");
                });
            }

            // Optional: close sidebar when clicking outside (on mobile only)
            document.addEventListener("click", function(event) {
                if (window.innerWidth < 992 && sidebar.classList.contains("active")) {
                    if (!sidebar.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
                        sidebar.classList.remove("active");
                    }
                }
            });
        });
    </script>

    </body>

    </html>
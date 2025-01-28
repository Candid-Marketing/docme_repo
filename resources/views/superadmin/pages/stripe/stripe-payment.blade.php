<!DOCTYPE html>
<html>
<head>
    <title>Stripe Subscription Plans</title>
    <script src="https://js.stripe.com/v3/"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
                background: linear-gradient(90deg, rgb(92, 0, 131), rgb(241, 106, 214));
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            .container {
                    max-width: 1200px;
                    margin: 50px auto;
                    padding: 15px; /* Add padding for small devices */
                }

                .card {
                        border-radius: 10px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                    }

                    .card:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
                    }

                        .card-title {
            font-size: 1.25rem; /* Smaller font for better scaling */
        }

            .btn-subscribe {
                width: 100%;
            }
            .text-whites h1 {
                background: linear-gradient(90deg, rgb(92, 0, 131), rgb(241, 106, 214));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                font-size: 2.5rem; /* Adjust font size for headers */
                text-align: center;
            }

            @media (max-width: 768px) {
        .card-title {
            font-size: 1.1rem;
        }

        .text-whites h1 {
            font-size: 2rem;
        }

        .card-text {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .container {
            margin: 20px auto;
        }

        .card-title {
            font-size: 1rem;
        }

        .card-text {
            font-size: 0.8rem;
        }
    }
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-5 text-whites">Choose Your Subscription Plan</h1>
        <div class="row g-4">
            <!-- Weekly Plan -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Weekly Plan</h5>
                        <p class="card-text">$3 per week</p>
                        <ul class="list-unstyled">
                            <li>Access for 1 week</li>
                            <li>Premium content</li>
                            <li>Cancel anytime</li>
                        </ul>
                        <button class="btn btn-primary btn-subscribe" data-plan="weekly" data-amount="300">Subscribe</button>
                    </div>
                </div>
            </div>

            <!-- Monthly Plan -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Monthly Plan</h5>
                        <p class="card-text">$10 per month</p>
                        <ul class="list-unstyled">
                            <li>Access for 1 month</li>
                            <li>Exclusive updates</li>
                            <li>Cancel anytime</li>
                        </ul>
                        <button class="btn btn-primary btn-subscribe" data-plan="monthly" data-amount="1000">Subscribe</button>
                    </div>
                </div>
            </div>

            <!-- Yearly Plan -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Yearly Plan</h5>
                        <p class="card-text">$100 per year</p>
                        <ul class="list-unstyled">
                            <li>Access for 1 year</li>
                            <li>Best value</li>
                            <li>Priority support</li>
                        </ul>
                        <button class="btn btn-primary btn-subscribe" data-plan="yearly" data-amount="10000">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subscription Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Complete Your Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="payment-form" method="POST">
                        <div class ="mb-3">
                            <label for="plan-details" class="form-label">Plan Details</label>
                            <input type="text" id="plan-details" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="card-element" class="form-label">Enter your card details</label>
                            <div id="card-element"></div>
                            <small id="card-errors" class="text-danger mt-1"></small>
                        </div>
                        <button type="submit" id="submit-button" class="btn btn-primary w-100">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and Stripe JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const stripe = Stripe('{{ $stripe->stripe_key }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));

        document.querySelectorAll('.btn-subscribe').forEach(button => {
            button.addEventListener('click', function () {
                const amount = this.getAttribute('data-amount');

                // Update modal with selected plan details
                document.getElementById('plan-details').value = `${this.getAttribute('data-plan').charAt(0).toUpperCase() + this.getAttribute('data-plan').slice(1)} Plan - $${(amount / 100).toFixed(2)}`;

                // Show the modal
                paymentModal.show();
            });
        });

        $(document).ready(function () {
            $('#payment-form').on('submit', function (e) {
                e.preventDefault();

                // Get the selected plan and amount
                const selectedPlan = $('#plan-details').val().split(' ')[0].toLowerCase();
                const amount = $('.btn-subscribe[data-plan="' + selectedPlan + '"]').data('amount');

                if (!amount) {
                    $('#card-errors').text('Invalid amount or plan selected.');
                    return;
                }

                // Create a payment intent on the server
                $.ajax({
                    url: "{{ route('payment.proceed') }}", // Your route
                    method: 'POST',
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                    },
                    data: JSON.stringify({ amount: amount }), // Send amount to backend
                    success: function (response) {
                        const clientSecret = response.clientSecret;

                        // Confirm the payment using Stripe.js
                        stripe.confirmCardPayment(clientSecret, {
                            payment_method: {
                                card: cardElement,
                            }
                        }).then(function (result) {
                            if (result.error) {
                                $('#card-errors').text(result.error.message);
                            } else {
                                alert('Payment successful!');
                                paymentModal.hide();
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        const errorMessage = xhr.responseJSON?.error || 'An error occurred while processing your payment. Please try again.';
                        $('#card-errors').text(errorMessage);
                    }
                });
            });
        });
    </script>
</body>
</html>

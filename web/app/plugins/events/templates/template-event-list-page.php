<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upcoming Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Animated background with a subtle effect */
        body {
            background: #f4f7fa; /* Light gray background */
            font-family: 'Arial', sans-serif;
            color: #333; /* Dark gray text for better readability */
        }

        /* Container with card effect */
        .container {
            position: relative;
            z-index: 10;
            background: #ffffff; /* White background for clarity */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Section title */
        .section-title {
            font-size: 2.5rem;
            font-weight: 600;
            color: #2c3e50; /* Dark blue-gray for the title */
            margin-bottom: 40px;
            text-align: center;
        }

        /* Styling for Event Cards */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Card hover effects */
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Fade-in animation for event cards */
        .event-card {
            opacity: 0;
            animation: fadeIn 0.5s ease-in-out forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* Image zoom effect on hover */
        .card-img-top {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover .card-img-top {
            transform: scale(1.05); /* Slight zoom effect on image */
        }

        /* Styling for the event info */
        .event-info {
            font-size: 1.1rem;
            color: #7f8c8d; /* Light gray text for the event details */
        }

        /* Adding spacing between content */
        .event-card {
            animation-delay: 0.1s;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <!-- Title of the Section -->
        <h2 class="section-title">Upcoming Events</h2>

        <!-- Event List -->
        <div class="row">
            <!-- Event 1 -->
            <div class="col-md-4 mb-4 event-card" style="animation-delay: 0.1s;">
                <div class="card">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Event Image">
                    <div class="card-body">
                        <h5 class="card-title">Event Title 1</h5>
                        <p class="event-info"><strong>Date:</strong> January 15, 2024</p>
                        <p class="event-info"><strong>Start Time:</strong> 10:00 AM | <strong>End Time:</strong> 2:00 PM</p>
                        <p class="card-text">This is a description of Event 1. It's an exciting event that includes keynotes, workshops, and networking.</p>
                    </div>
                </div>
            </div>

            <!-- Event 2 -->
            <div class="col-md-4 mb-4 event-card" style="animation-delay: 0.2s;">
                <div class="card">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Event Image">
                    <div class="card-body">
                        <h5 class="card-title">Event Title 2</h5>
                        <p class="event-info"><strong>Date:</strong> January 20, 2024</p>
                        <p class="event-info"><strong>Start Time:</strong> 9:00 AM | <strong>End Time:</strong> 12:00 PM</p>
                        <p class="card-text">Join us for Event 2, a chance to network with industry leaders and attend insightful sessions.</p>
                    </div>
                </div>
            </div>

            <!-- Event 3 -->
            <div class="col-md-4 mb-4 event-card" style="animation-delay: 0.3s;">
                <div class="card">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Event Image">
                    <div class="card-body">
                        <h5 class="card-title">Event Title 3</h5>
                        <p class="event-info"><strong>Date:</strong> February 5, 2024</p>
                        <p class="event-info"><strong>Start Time:</strong> 1:00 PM | <strong>End Time:</strong> 5:00 PM</p>
                        <p class="card-text">Event 3 will provide valuable insights and hands-on experience through interactive sessions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

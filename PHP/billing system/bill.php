<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing System</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        body {
            padding: 3em 8em;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .heading {
            text-align: center;
            font-size: 2em;
            font-weight: 500;
            margin-bottom: 1.4em;
        }

        p {
            font-size: 1.2em;
            margin: 0;
            margin-bottom: 12px;
        }

        .summary-container {
            border: 1px solid #202020;
            border-radius: 6px;
            padding: 24px 32px;
        }

        button {
            width: 50%;
            margin: 24px 0;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9em;
            letter-spacing: 1px;
            padding: 12px;
            border: 2px solid #202020;
            border-radius: 6px;
            transition: all 0.3s ease-in-out;
        }

        .btn-container {
            display: flex;
            gap: 24px;
        }

        @media print {
            .prnt-btn {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div>
        <p class="heading">Your Bill Summary</p>

        <?php
        $summary = $_POST['summary'];
        $total = floatval($_POST['total']);

        $summary = str_replace("\n", "<br>", $summary);
        $summary = str_replace("Item:", "<b>Item:</b>", $summary);
        $summary = str_replace("Price:", "&nbsp;&nbsp;&nbsp;&nbsp;<b>Price:</b>", $summary);
        $summary = str_replace("Qty:", "&nbsp;&nbsp;&nbsp;&nbsp;<b>Qty:</b>", $summary);

        // $discount = 5;
        $discount = ($total >= 5000) ? 20 : (($total >= 4000) ? 15 : (($total >= 3000) ? 10 : 5));
        $discountedTotal = $total - ($total * ($discount / 100));

        echo "<div class='summary-container'>" . $summary . "</div>" .
            "<br><p><b>Total(₹):</b> " . $total .
            "</p><p><b>Discount(%):</b> " . $discount .
            "</p><p><b>Discounted Total(₹):</b> " . $discountedTotal .
            "</p><p><b>Your Savings(₹):</b> " . ($total - $discountedTotal) . "</p>";
        ?>

        <div class="btn-container">
            <button class="prnt-btn">Print Bill</button>
            <button class="back-btn">Go Back</button>
        </div>
    </div>


    <script>
        document.querySelector(".prnt-btn").addEventListener("click", () => {
            window.print();
        })

        document.querySelector(".back-btn").addEventListener("click", () => {
            window.history.back();
        })
    </script>
</body>

</html>
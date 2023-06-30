<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Happy Birthday!</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;
        color: #333;
        background-color: #f7f7f7;
      }
      .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      }
      h1 {
        margin-top: 0;
        color: #0099cc;
      }
      p {
        margin-bottom: 20px;
      }
      .cta {
        display: inline-block;
        padding: 10px 20px;
        background-color: #0099cc;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
      }
      .cta:hover {
        background-color: #0077b3;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Happy Birthday!</h1>
      <p>Dear {!! $name !!},</p>
      <p>On behalf of the entire team at GR Infotech, I want to wish you a very happy birthday!</p>
      <p>We appreciate all of the hard work and dedication that you bring to the company each and every day. Your contributions do not go unnoticed.</p>
      {{-- <p>To celebrate your special day, we have a little surprise for you. Please click the button below to redeem your gift:</p> --}}
      {{-- <a href="[Gift Link]" class="cta">Redeem Gift</a> --}}
      <p>Once again, happy birthday! We hope that you have a fantastic day filled with love, laughter, and celebration.</p>
      <p>Best regards,</p>
      <p>GR Infotech Team</p>
    </div>
  </body>
</html>
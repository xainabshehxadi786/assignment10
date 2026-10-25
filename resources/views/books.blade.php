<!DOCTYPE html>
<html>
<head>
    <title>Book Form - Assignment 09</title>

    <style>
        body {		
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        form {
            max-width: 400px;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Add a Book</h2>

    <form>
        <label for="book_title">Book Title:</label>
        <input
            type="text"
            id="book_title"
            name="book_title"
            placeholder="Enter book title"
            required
        >

        <label for="book_price">Book Price:</label>
        <input
            type="number"
            id="book_price"
            name="book_price"
            step="0.01"
            min="0"
            placeholder="Enter book price"
            required
        >

        <label for="book_author">Book Author:</label>
        <input
            type="text"
            id="book_author"
            name="book_author"
            placeholder="Enter author name"
            required
        >

        <button type="submit">Submit</button>
    </form>

</body>
</html>

<div style="display: flex; flex-direction: column; align-items: center; margin: 20px;">
    <!-- Form for submitting student data -->
    <h1 style="color: #4CAF50; font-family: Arial, sans-serif; margin-bottom: 20px;">Add Student Details</h1>
    <form 
        action="show" 
        method="post" 
        style="
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        "
    >
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="name" style="font-weight: bold; display: block; margin-bottom: 5px;">Name:</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                required 
                placeholder="Enter student name"
                style="
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    font-size: 14px;
                "
            >
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="font-weight: bold; display: block; margin-bottom: 5px;">Email:</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                required 
                placeholder="Enter email address"
                style="
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    font-size: 14px;
                "
            >
        </div>

        <div style="margin-bottom: 15px;">
            <label for="address" style="font-weight: bold; display: block; margin-bottom: 5px;">Address:</label>
            <input 
                type="text" 
                id="address" 
                name="address" 
                required 
                placeholder="Enter address"
                style="
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    font-size: 14px;
                "
            >
        </div>

        <div style="margin-bottom: 15px;">
            <label for="phone" style="font-weight: bold; display: block; margin-bottom: 5px;">Phone:</label>
            <input 
                type="tel" 
                id="phone" 
                name="phone" 
                required 
                placeholder="Enter phone number"
                style="
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    font-size: 14px;
                "
            >
        </div>

        <div style="margin-bottom: 15px;">
            <label for="created_at" style="font-weight: bold; display: block; margin-bottom: 5px;">Created At:</label>
            <input 
                type="datetime-local" 
                id="created_at" 
                name="created_at" 
                required 
                style="
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    font-size: 14px;
                "
            >
        </div>

        <div style="margin-bottom: 15px;">
            <label for="updated_at" style="font-weight: bold; display: block; margin-bottom: 5px;">Updated At:</label>
            <input 
                type="datetime-local" 
                id="updated_at" 
                name="updated_at" 
                required 
                style="
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    font-size: 14px;
                "
            >
        </div>

        <button 
            type="submit" 
            style="
                width: 100%;
                padding: 10px;
                background-color: #4CAF50;
                color: white;
                font-size: 16px;
                font-weight: bold;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            "
            onmouseover="this.style.backgroundColor='#45a049'"
            onmouseout="this.style.backgroundColor='#4CAF50'"
        >
            Submit
        </button>
    </form>

    <!-- Displaying student data in a list -->
    <h2 style="margin-top: 30px; color: #555;">Student Data List</h2>
    <ul 
        style="
            list-style-type: none;
            padding: 0;
            width: 100%;
            max-width: 600px;
        "
    >
        <li 
            style="
                padding: 10px;
                margin: 5px 0;
                background-color: #f8f9fa;
                border: 1px solid #ddd;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            "
        >
            Example student data goes here
        </li>
    </ul>
</div>

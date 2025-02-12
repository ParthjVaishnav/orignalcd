<div>
    <h1 style="color: #4CAF50; font-family: Arial, sans-serif; margin-bottom: 20px;">Edit Student Details</h1>
    <form 
        action="/edit-student/{{ $data->id }}" 
        method="post" 
        style="
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        " 
        onsubmit="return showAlert()"
    >
        @csrf
        @method('put')

        <!-- Name Field -->
        <div style="margin-bottom: 15px;">
            <label for="name" style="font-weight: bold; display: block; margin-bottom: 5px;">Name:</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                required 
                placeholder="Enter student name"
                value="{{ $data->name }}"
                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;"
            >
        </div>

        <!-- Email Field -->
        <div style="margin-bottom: 15px;">
            <label for="email" style="font-weight: bold; display: block; margin-bottom: 5px;">Email:</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                required 
                placeholder="Enter email address"
                value="{{ $data->email }}"
                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;"
            >
        </div>

        <!-- Address Field -->
        <div style="margin-bottom: 15px;">
            <label for="address" style="font-weight: bold; display: block; margin-bottom: 5px;">Address:</label>
            <input 
                type="text" 
                id="address" 
                name="address" 
                required 
                placeholder="Enter address"
                value="{{ $data->address }}"
                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;"
            >
        </div>

        <!-- Phone Field -->
        <div style="margin-bottom: 15px;">
            <label for="phone" style="font-weight: bold; display: block; margin-bottom: 5px;">Phone:</label>
            <input 
                type="tel" 
                id="phone" 
                name="phone" 
                required 
                placeholder="Enter phone number"
                value="{{ $data->phone }}"
                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;"
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
            Update
        </button>

        <!-- Cancel Button -->
        <a 
            href="/show-data" 
            style="
                display: block;
                text-align: center;
                padding: 10px;
                background-color: #f44336; /* Red color for cancel button */
                color: white;
                font-size: 16px;
                font-weight: bold;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s;
                margin-top: 10px;
            "
            onmouseover="this.style.backgroundColor='#d32f2f'"
            onmouseout="this.style.backgroundColor='#f44336'"
        >
            Cancel
        </a>
    </form>
</div>

<script>
    function showAlert() {
        alert("Student details have been successfully updated!");
        return true; // Continue the form submission after the alert
    }
</script>

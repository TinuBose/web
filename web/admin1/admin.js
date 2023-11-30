// Dummy data for user list
const users = [
    { id: 1, username: "admin", email: "admin@example.com" },
    { id: 2, username: "user1", email: "user1@example.com" },
    { id: 3, username: "user2", email: "user2@example.com" },
];

// Function to populate user list
function populateUserList() {
    const userList = document.getElementById("users");
    userList.innerHTML = "";
    users.forEach(user => {
        const li = document.createElement("li");
        li.textContent = `ID: ${user.id}, Username: ${user.username}, Email: ${user.email}`;
        userList.appendChild(li);
    });
}

// Event listener for form submission
const addUserForm = document.getElementById("add-user-form");
addUserForm.addEventListener("submit", function(event) {
    event.preventDefault();
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const newUser = {
        id: users.length + 1,
        username,
        email,
    };
    users.push(newUser);
    populateUserList();
    addUserForm.reset();
});

// Initial population of the user list
populateUserList();

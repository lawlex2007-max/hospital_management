
<style>
.profile-container { 
    position: fixed; 
    top: 15px; 
    right: 20px; 
    z-index: 9999; 
}
.profile-circle { 
    width: 45px; 
    height: 45px; 
    background: #00cc99; 
    border-radius: 50%; 
    color: white; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    font-weight: bold; 
    cursor: pointer; 
    box-shadow: 0 0 10px rgba(16, 80, 112, 0.3); 
    user-select: none; 
} 
.profile-dropdown { 
    display: none; 
    position: absolute; 
    right: 0; 
    top: 55px; 
    background: white; 
    min-width: 220px; 
    border-radius: 8px; 
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); 
    padding: 15px; 
    color: #00a2ff; 
} 
.profile-dropdown.show { 
    display: block; 
} 
.profile-dropdown p { 
    margin: 5px 0; 
    font-size: 14px; 
} 
.profile-dropdown .name { 
    font-weight: bold; 
    font-size: 16px; 
} 
.profile-dropdown a { 
    display: block; 
    margin-top: 10px; 
    padding: 8px; 
    background: #f44336; 
    color: white; 
    text-align: center; 
    text-decoration: none; 
    border-radius: 5px; 
}
</style>
<?php 
if (!isset($_SESSION['username'])) return; 
$db = new SQLite3("hospital_management_2.db"); 
if (!$db) { 
    echo "DB error"; 
    return; 
} 
$username = $_SESSION['username']; 
$userType = $_SESSION['userType']; 
if ($userType === 'Patient') { 
    $stmt = $db->prepare("SELECT firstName, lastName, email FROM PATIENT WHERE username = :u"); 
} else { 
    $stmt = $db->prepare("SELECT firstName, lastName, email FROM STAFF WHERE username = :u AND userType = :t"); 
    $stmt->bindValue(':t', $userType, SQLITE3_TEXT); 
} 
$stmt->bindValue(':u', $username, SQLITE3_TEXT); 
$res = $stmt->execute(); 
$user = $res->fetchArray(SQLITE3_ASSOC); 
if (!$user) { 
    echo "User not found"; 
    return; 
} 
$initials = strtoupper(substr($user['firstName'], 0, 1) . substr($user['lastName'], 0, 1)); 
?> 
<div class="profile-container"> 
    <div class="profile-circle" onclick="toggleProfile()"><?= $initials ?></div> 
    <div class="profile-dropdown" id="profileDropdown"> 
        <p class="name"><?= htmlspecialchars($user['firstName'] . ' ' . $user['lastName']) ?></p> 
        <p><strong>Username:</strong> <?= htmlspecialchars($username) ?></p> 
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p> 
        <p><strong>Role:</strong> <?= htmlspecialchars($userType) ?></p> 
        <a href="logout.php">Logout</a> 
    </div> 
</div> 
<script> 
function toggleProfile() { 
    document.getElementById('profileDropdown').classList.toggle('show'); 
} 
window.onclick = function(event) { 
    if (!event.target.matches('.profile-circle')) { 
        var dropdown = document.getElementById('profileDropdown'); 
        if (dropdown.classList.contains('show')) { 
            dropdown.classList.remove('show'); 
        } 
    } 
} 
</script>
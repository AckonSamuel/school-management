<!-- Your HTML Structure -->
<ul>
    <li><a href="#" class="block hover:bg-gray-700 px-4 py-2" onclick="openModal()">Logout</a></li>
</ul>

<div class="overlay" id="overlay"></div>

<div class="modal" id="modal">
    <!-- Your Logout View HTML -->
    <h2>Logout</h2>
    <p>Are you sure you want to logout?</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <input type="submit" value="Logout">
    </form>
    <button onclick="closeModal()">Cancel</button>
</div>

<script>
    function openModal() {
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('modal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('modal').style.display = 'none';
    }
</script>

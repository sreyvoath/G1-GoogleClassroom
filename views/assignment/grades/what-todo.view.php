<div class="container">
    <table class="table">
        <!-- PHP loop for classes START -->
        <tbody class="tbodySearch" id="tbodySearch">
            <tr>
                <!-- Course item -->
                <td>
                    <div class="d-flex align-items-center justify-content-between">
                        <!-- Content -->
                        <div class="d-flex align-items-center">
                            <!-- Image -->
                            <div class="avatar avatar-xxl mt-n3">
                                <img class="avatar-img rounded-circle border border-white border-5 shadow" src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="">
                            </div>

                            <div class="mb-0 ms-2">
                                <!-- Title -->
                                <h6><?= $_SESSION['user']['name'] ?></h6>
                            </div>
                        </div>
                        <!-- Buttons -->
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <select id="filterSelect" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="filterItems()">
        <option value="0" selected>All</option>
        <option value="1">Turned in</option>
        <option value="2">Returned</option>
        <option value="3">Missing</option>
    </select>

    <!-- ----for display when select option all--------------------------------------------------------- -->
    
    <div id="allItems" class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <div data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                <div class="d-flex align-items-center justify-content-between shadow-sm mb-1 bg-body rounded px-4 py-2 border-start border-primary">
                    <div class=" align-items-center">
                        <p>name(homework)</p>
                        <p>No due date</p>
                    </div>
                    <h6>Assigned</h6>
                </div>
            </div>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="d-flex align-items-center justify-content-between shadow-sm mb-1 bg-body rounded px-4 py-3 border-start border-primary">
                    <div class=" align-items-center">
                        <p>No work has been attached</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between shadow-sm mb-1 bg-body rounded px-4 py-3 border-start border-primary">
                    <div class="d-flex align-items-center">
                        <div class="align-items-center">
                            <button type="button" class="btn btn-light"><a href="#">View instructions</a></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- -------to do for display when select returned------------------------------------------------------- -->
    <div class="container d-flex justify-content-center">




        <div id="turnedInItems" style="display:none;">
            <img src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="Turned in">
        </div>
    
        <div id="returnedItems" style="display:none;">
            <h2>hello Turned in</h2>
            <!-- Add your returned items content here -->
        </div>
        <div id="missingItems" style="display:none;">
            <h2>hello Sran bek tnam</h2>
            <!-- Add your returned items content here -->
        </div>
    </div>
</div>

<script>
    function filterItems() {
        var filter = document.getElementById('filterSelect').value;
        var allItems = document.getElementById('allItems');
        var turnedInItems = document.getElementById('turnedInItems');
        var returnedItems = document.getElementById('returnedItems');
        var missingItems =document.getElementById('missingItems')

        if (filter === '0') {
            allItems.style.display = 'block';
            turnedInItems.style.display = 'none';
            returnedItems.style.display = 'none';
            missingItems.style.display = 'none';
        } else if (filter === '1') {
            allItems.style.display = 'none';
            turnedInItems.style.display = 'block';
            returnedItems.style.display = 'none';
            missingItems.style.display = 'none';
        } else if (filter === '2') {
            allItems.style.display = 'none';
            turnedInItems.style.display = 'none';
            returnedItems.style.display = 'block';
            missingItems.style.display = 'none';
        } else if (filter === '3') {
            allItems.style.display = 'none';
            turnedInItems.style.display = 'none';
            returnedItems.style.display = 'none';
            missingItems.style.display = 'block';
            // Add logic for displaying missing items
        }
    }
</script>

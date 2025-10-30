<?php
session_start();

$os = $_SESSION["o"] ?? '';
$ps = $_SESSION["p"] ?? '';
$_SESSION["os"] = $os;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client Database</title>
  
  <!-- Only include head.php if it exists -->
  <?php if (file_exists('head.php')) include('head.php'); ?>
  
  <!-- Include stylesheets if they exist -->
  <?php if (file_exists('css/stylei.css')) echo '<link rel="stylesheet" href="css/stylei.css">'; ?>
  <?php if (file_exists('css/stylei2.css')) echo '<link rel="stylesheet" href="css/stylei2.css">'; ?>
  <?php if (file_exists('css/whatsappButton.css')) echo '<link rel="stylesheet" href="css/whatsappButton.css">'; ?>
  
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f5f7fa;
      padding: 20px;
    }
    
    .container {
      max-width: 98%;
      margin: 0 auto;
      background: white;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      padding: 25px;
    }
    
    .header-section {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      flex-wrap: wrap;
      gap: 15px;
    }
    
    .header-section h2 {
      margin: 0;
      color: #2c3e50;
      font-size: 24px;
    }
    
    .controls {
      display: flex;
      gap: 10px;
      align-items: center;
      flex-wrap: wrap;
    }
    
    .search-box {
      padding: 10px 15px;
      border: 2px solid #e0e0e0;
      border-radius: 8px;
      font-size: 14px;
      width: 300px;
      transition: all 0.3s;
    }
    
    .search-box:focus {
      outline: none;
      border-color: #04af2f;
      box-shadow: 0 0 0 3px rgba(4, 175, 47, 0.1);
    }
    
    .btn {
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      font-weight: 600;
      transition: all 0.3s;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }
    
    .btn-primary {
      background: #04af2f;
      color: white;
    }
    
    .btn-primary:hover {
      background: #039427;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(4, 175, 47, 0.3);
    }
    
    .btn-secondary {
      background: #6c757d;
      color: white;
    }
    
    .btn-secondary:hover {
      background: #5a6268;
      transform: translateY(-2px);
    }
    
    .table-wrapper {
      overflow-x: auto;
      border-radius: 8px;
      border: 1px solid #e0e0e0;
      margin-bottom: 20px;
    }
    
    .table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      font-size: 13px;
    }
    
    .table thead {
      background: linear-gradient(135deg, #04af2f 0%, #039427 100%);
      position: sticky;
      top: 0;
      z-index: 10;
    }
    
    .table th {
      padding: 15px 12px;
      text-align: left;
      color: white;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 11px;
      letter-spacing: 0.5px;
      border: none;
      cursor: pointer;
      user-select: none;
      white-space: nowrap;
    }
    
    .table th:hover {
      background: rgba(255, 255, 255, 0.1);
    }
    
    .table th.sortable::after {
      content: ' ⇅';
      opacity: 0.5;
      font-size: 12px;
    }
    
    .table th.sorted-asc::after {
      content: ' ↑';
      opacity: 1;
    }
    
    .table th.sorted-desc::after {
      content: ' ↓';
      opacity: 1;
    }
    
    .table td {
      padding: 12px;
      border-bottom: 1px solid #f0f0f0;
      color: #2c3e50;
    }
    
    .table tbody tr {
      transition: all 0.2s;
    }
    
    .table tbody tr:hover {
      background: #f8f9fa;
      transform: scale(1.001);
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    
    .table tbody tr:nth-child(even) {
      background: #fafbfc;
    }
    
    .table tbody tr:nth-child(even):hover {
      background: #f0f2f4;
    }
    
    .badge {
      display: inline-block;
      padding: 4px 10px;
      border-radius: 12px;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
    }
    
    .badge-vip {
      background: #ffd700;
      color: #856404;
    }
    
    .badge-regular {
      background: #e3f2fd;
      color: #1565c0;
    }
    
    .badge-none {
      background: #f5f5f5;
      color: #757575;
    }
    
    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      margin-top: 20px;
    }
    
    .page-btn {
      padding: 8px 12px;
      border: 1px solid #e0e0e0;
      background: white;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.2s;
      font-size: 13px;
    }
    
    .page-btn:hover:not(:disabled) {
      background: #04af2f;
      color: white;
      border-color: #04af2f;
    }
    
    .page-btn.active {
      background: #04af2f;
      color: white;
      border-color: #04af2f;
    }
    
    .page-btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }
    
    /* Import Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      backdrop-filter: blur(5px);
      animation: fadeIn 0.3s;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    
    .modal-content {
      background: white;
      margin: 2% auto;
      padding: 0;
      border-radius: 16px;
      width: 90%;
      max-width: 1200px;
      max-height: 90vh;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(0,0,0,0.3);
      animation: slideUp 0.3s;
    }
    
    @keyframes slideUp {
      from { transform: translateY(50px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    
    .modal-header {
      background: linear-gradient(135deg, #04af2f 0%, #039427 100%);
      color: white;
      padding: 25px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .modal-header h2 {
      margin: 0;
      font-size: 24px;
    }
    
    .close {
      color: white;
      font-size: 32px;
      font-weight: bold;
      cursor: pointer;
      transition: transform 0.2s;
      line-height: 1;
    }
    
    .close:hover {
      transform: scale(1.2) rotate(90deg);
    }
    
    .modal-body {
      padding: 30px;
      max-height: calc(90vh - 180px);
      overflow-y: auto;
    }
    
    .upload-area {
      border: 3px dashed #04af2f;
      border-radius: 12px;
      padding: 60px 40px;
      text-align: center;
      background: linear-gradient(135deg, rgba(4, 175, 47, 0.05) 0%, rgba(3, 148, 39, 0.05) 100%);
      cursor: pointer;
      transition: all 0.3s;
      margin-bottom: 30px;
    }
    
    .upload-area:hover {
      border-color: #039427;
      background: linear-gradient(135deg, rgba(4, 175, 47, 0.1) 0%, rgba(3, 148, 39, 0.1) 100%);
      transform: translateY(-2px);
    }
    
    .upload-area.drag-over {
      border-color: #039427;
      background: linear-gradient(135deg, rgba(4, 175, 47, 0.15) 0%, rgba(3, 148, 39, 0.15) 100%);
      transform: scale(1.02);
    }
    
    .upload-icon {
      font-size: 64px;
      margin-bottom: 20px;
    }
    
    .upload-area h3 {
      margin: 0 0 10px 0;
      color: #04af2f;
      font-size: 22px;
    }
    
    .upload-area p {
      margin: 0;
      color: #666;
      font-size: 14px;
    }
    
    #csvFileInput {
      display: none;
    }
    
    .mapping-section {
      display: none;
      animation: fadeIn 0.3s;
    }
    
    .mapping-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }
    
    .mapping-item {
      background: #f8f9fa;
      padding: 15px;
      border-radius: 8px;
      border: 2px solid #e0e0e0;
    }
    
    .mapping-item label {
      display: block;
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 8px;
      font-size: 13px;
    }
    
    .mapping-item select {
      width: 100%;
      padding: 10px;
      border: 2px solid #e0e0e0;
      border-radius: 6px;
      font-size: 13px;
      cursor: pointer;
      background: white;
    }
    
    .preview-section {
      display: none;
      margin-top: 30px;
      animation: fadeIn 0.3s;
    }
    
    .preview-section h3 {
      margin: 0 0 15px 0;
      color: #2c3e50;
    }
    
    .preview-table-wrapper {
      max-height: 300px;
      overflow: auto;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
    }
    
    .preview-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 12px;
    }
    
    .preview-table th {
      background: #f8f9fa;
      padding: 10px;
      text-align: left;
      position: sticky;
      top: 0;
      font-weight: 600;
      border-bottom: 2px solid #e0e0e0;
    }
    
    .preview-table td {
      padding: 8px 10px;
      border-bottom: 1px solid #f0f0f0;
    }
    
    .modal-footer {
      padding: 20px 30px;
      background: #f8f9fa;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-top: 1px solid #e0e0e0;
    }
    
    .import-status {
      font-size: 14px;
      color: #666;
    }
    
    .btn-large {
      padding: 12px 30px;
      font-size: 15px;
    }
    
    .success-message {
      background: #d4edda;
      color: #155724;
      padding: 15px 20px;
      border-radius: 8px;
      margin-bottom: 20px;
      display: none;
      border: 1px solid #c3e6cb;
    }
    
    .error-message {
      background: #f8d7da;
      color: #721c24;
      padding: 15px 20px;
      border-radius: 8px;
      margin-bottom: 20px;
      display: none;
      border: 1px solid #f5c6cb;
    }
    
    .stats {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }
    
    .stat-card {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 20px;
      border-radius: 10px;
      flex: 1;
      min-width: 200px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    .stat-card h3 {
      margin: 0 0 10px 0;
      font-size: 28px;
      font-weight: 700;
    }
    
    .stat-card p {
      margin: 0;
      opacity: 0.9;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    
    .no-results {
      text-align: center;
      padding: 40px;
      color: #757575;
      font-size: 16px;
    }
    
    select {
      padding: 8px 12px;
      border: 2px solid #e0e0e0;
      border-radius: 6px;
      font-size: 13px;
      cursor: pointer;
    }
    
    @media (max-width: 768px) {
      .header-section {
        flex-direction: column;
        align-items: stretch;
      }
      
      .search-box {
        width: 100%;
      }
      
      .controls {
        width: 100%;
      }
      
      .table {
        font-size: 11px;
      }
      
      .table th, .table td {
        padding: 8px 6px;
      }
    }
  </style>
  
  <script>
    let allRows = [];
    let currentSort = { column: null, direction: 'asc' };
    let currentPage = 1;
    let rowsPerPage = 25;
    
    function initTable() {
      const tbody = document.querySelector('.table tbody');
      if (!tbody) {
        return;
      }
      
      allRows = Array.from(tbody.querySelectorAll('tr'));
      
      const pagination = document.querySelector('.pagination');
      if (!pagination) {
        return;
      }
      
      setupSearch();
      setupSort();
      setupPagination();
      updateDisplay();
    }
    
    function setupSearch() {
      const searchBox = document.getElementById('searchBox');
      if (!searchBox) return;
      searchBox.addEventListener('input', (e) => {
        currentPage = 1;
        updateDisplay();
      });
    }
    
    function setupSort() {
      const headers = document.querySelectorAll('.table th.sortable');
      headers.forEach((header, index) => {
        header.addEventListener('click', () => {
          sortTable(index, header);
        });
      });
    }
    
    function sortTable(columnIndex, header) {
      const direction = currentSort.column === columnIndex && currentSort.direction === 'asc' ? 'desc' : 'asc';
      
      document.querySelectorAll('.table th').forEach(h => {
        h.classList.remove('sorted-asc', 'sorted-desc');
      });
      
      header.classList.add(direction === 'asc' ? 'sorted-asc' : 'sorted-desc');
      
      allRows.sort((a, b) => {
        const aVal = a.cells[columnIndex].textContent.trim();
        const bVal = b.cells[columnIndex].textContent.trim();
        
        const aNum = parseFloat(aVal);
        const bNum = parseFloat(bVal);
        
        if (!isNaN(aNum) && !isNaN(bNum)) {
          return direction === 'asc' ? aNum - bNum : bNum - aNum;
        }
        
        return direction === 'asc' ? aVal.localeCompare(bVal) : bVal.localeCompare(aVal);
      });
      
      currentSort = { column: columnIndex, direction };
      currentPage = 1;
      updateDisplay();
    }
    
    function getFilteredRows() {
      const searchTerm = document.getElementById('searchBox').value.toLowerCase();
      
      if (!searchTerm) return allRows;
      
      return allRows.filter(row => {
        const text = Array.from(row.cells).map(cell => cell.textContent.toLowerCase()).join(' ');
        return text.includes(searchTerm);
      });
    }
    
    function updateDisplay() {
      const filteredRows = getFilteredRows();
      const tbody = document.querySelector('.table tbody');
      
      while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
      }
      
      const startIndex = (currentPage - 1) * rowsPerPage;
      const endIndex = startIndex + rowsPerPage;
      const visibleRows = filteredRows.slice(startIndex, endIndex);
      
      if (filteredRows.length === 0) {
        const tr = document.createElement('tr');
        const td = document.createElement('td');
        td.colSpan = 29;
        td.className = 'no-results';
        td.textContent = 'No results found';
        tr.appendChild(td);
        tbody.appendChild(tr);
      } else {
        visibleRows.forEach(row => {
          tbody.appendChild(row.cloneNode(true));
        });
      }
      
      updatePagination(filteredRows.length);
      updateStats(filteredRows.length);
    }
    
    function updatePagination(totalRows) {
      const totalPages = Math.ceil(totalRows / rowsPerPage);
      const pagination = document.querySelector('.pagination');
      
      if (!pagination) return;
      
      pagination.innerHTML = '';
      
      const prevBtn = document.createElement('button');
      prevBtn.textContent = '← Previous';
      prevBtn.className = 'page-btn';
      prevBtn.disabled = currentPage === 1;
      prevBtn.onclick = () => { currentPage--; updateDisplay(); };
      pagination.appendChild(prevBtn);
      
      const startPage = Math.max(1, currentPage - 2);
      const endPage = Math.min(totalPages, currentPage + 2);
      
      if (startPage > 1) {
        const btn = document.createElement('button');
        btn.textContent = '1';
        btn.className = 'page-btn';
        btn.onclick = () => { currentPage = 1; updateDisplay(); };
        pagination.appendChild(btn);
        
        if (startPage > 2) {
          const dots = document.createElement('span');
          dots.textContent = '...';
          dots.style.padding = '0 5px';
          pagination.appendChild(dots);
        }
      }
      
      for (let i = startPage; i <= endPage; i++) {
        const btn = document.createElement('button');
        btn.textContent = i;
        btn.className = 'page-btn' + (i === currentPage ? ' active' : '');
        btn.onclick = () => { currentPage = i; updateDisplay(); };
        pagination.appendChild(btn);
      }
      
      if (endPage < totalPages) {
        if (endPage < totalPages - 1) {
          const dots = document.createElement('span');
          dots.textContent = '...';
          dots.style.padding = '0 5px';
          pagination.appendChild(dots);
        }
        
        const btn = document.createElement('button');
        btn.textContent = totalPages;
        btn.className = 'page-btn';
        btn.onclick = () => { currentPage = totalPages; updateDisplay(); };
        pagination.appendChild(btn);
      }
      
      const nextBtn = document.createElement('button');
      nextBtn.textContent = 'Next →';
      nextBtn.className = 'page-btn';
      nextBtn.disabled = currentPage === totalPages || totalPages === 0;
      nextBtn.onclick = () => { currentPage++; updateDisplay(); };
      pagination.appendChild(nextBtn);
    }
    
    function updateStats(visibleCount) {
      const element = document.getElementById('visibleCount');
      if (element) {
        element.textContent = visibleCount;
      }
    }
    
    function setupPagination() {
      const select = document.getElementById('rowsPerPage');
      if (!select) return;
      select.addEventListener('change', (e) => {
        rowsPerPage = parseInt(e.target.value);
        currentPage = 1;
        updateDisplay();
      });
    }
    
    function exportToCSV() {
      const filteredRows = getFilteredRows();
      const headers = Array.from(document.querySelectorAll('.table th')).map(th => th.textContent.trim());
      
      let csv = headers.join(',') + '\n';
      
      filteredRows.forEach(row => {
        const values = Array.from(row.cells).map(cell => {
          let text = cell.textContent.trim();
          if (text.includes(',') || text.includes('"') || text.includes('\n')) {
            text = '"' + text.replace(/"/g, '""') + '"';
          }
          return text;
        });
        csv += values.join(',') + '\n';
      });
      
      const blob = new Blob([csv], { type: 'text/csv' });
      const url = window.URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'clients_export_' + new Date().toISOString().split('T')[0] + '.csv';
      a.click();
      window.URL.revokeObjectURL(url);
    }
    
    function quit() {
      window.close();
    }
    
    function refresh() {
      location.reload();
    }
    
    // CSV Import Functions
    let csvData = [];
    let csvHeaders = [];
    
    function openImportModal() {
      document.getElementById('importModal').style.display = 'block';
    }
    
    function closeImportModal() {
      document.getElementById('importModal').style.display = 'none';
      resetImportModal();
    }
    
    function resetImportModal() {
      csvData = [];
      csvHeaders = [];
      document.getElementById('csvFileInput').value = '';
      document.querySelector('.upload-area').style.display = 'block';
      document.querySelector('.mapping-section').style.display = 'none';
      document.querySelector('.preview-section').style.display = 'none';
      document.querySelector('.success-message').style.display = 'none';
      document.querySelector('.error-message').style.display = 'none';
    }
    
    function handleFileSelect(e) {
      const file = e.target.files[0];
      if (file) {
        processCSVFile(file);
      }
    }
    
    function processCSVFile(file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const text = e.target.result;
        parseCSV(text);
      };
      reader.readAsText(file);
    }
    
    function parseCSV(text) {
      // Proper CSV parsing that handles quotes and multiline fields
      const rows = [];
      let currentRow = [];
      let currentField = '';
      let insideQuotes = false;
      
      for (let i = 0; i < text.length; i++) {
        const char = text[i];
        const nextChar = text[i + 1];
        
        if (char === '"') {
          if (insideQuotes && nextChar === '"') {
            // Escaped quote
            currentField += '"';
            i++; // Skip next quote
          } else {
            // Toggle quote state
            insideQuotes = !insideQuotes;
          }
        } else if (char === ',' && !insideQuotes) {
          // End of field
          currentRow.push(currentField.trim());
          currentField = '';
        } else if ((char === '\n' || char === '\r') && !insideQuotes) {
          // End of row
          if (currentField || currentRow.length > 0) {
            currentRow.push(currentField.trim());
            if (currentRow.some(field => field !== '')) {
              rows.push(currentRow);
            }
            currentRow = [];
            currentField = '';
          }
          // Skip \r\n combination
          if (char === '\r' && nextChar === '\n') {
            i++;
          }
        } else {
          // Regular character
          currentField += char;
        }
      }
      
      // Add last field and row if exists
      if (currentField || currentRow.length > 0) {
        currentRow.push(currentField.trim());
        if (currentRow.some(field => field !== '')) {
          rows.push(currentRow);
        }
      }
      
      if (rows.length < 2) {
        showError('CSV file must have headers and at least one data row');
        return;
      }
      
      csvHeaders = rows[0].map(h => h.trim());
      csvData = [];
      
      for (let i = 1; i < rows.length; i++) {
        const row = {};
        csvHeaders.forEach((header, index) => {
          row[header] = rows[i][index] || '';
        });
        csvData.push(row);
      }
      
      console.log('Parsed CSV data:', csvData);
      showMappingSection();
    }
    
    function showMappingSection() {
      document.querySelector('.upload-area').style.display = 'none';
      document.querySelector('.mapping-section').style.display = 'block';
      
      const dbFields = [
        'nom', 'prenom', 'category', 'source', 'grade', 'payment', 'card', 
        'community', 'company', 'job', 'number', 'inumber', 'telmobile', 
        'telother', 'email', 'url', 'business', 'city', 'street', 'floor', 
        'apartment', 'building', 'zone', 'near', 'remark', 'address', 
        'address_two', 'best_delivery_time'
      ];
      
      const mappingGrid = document.getElementById('mappingGrid');
      mappingGrid.innerHTML = '';
      
      dbFields.forEach(field => {
        const div = document.createElement('div');
        div.className = 'mapping-item';
        
        const label = document.createElement('label');
        label.textContent = field.replace(/_/g, ' ').toUpperCase();
        
        const select = document.createElement('select');
        select.id = `map_${field}`;
        
        const optionNone = document.createElement('option');
        optionNone.value = '';
        optionNone.textContent = '-- Skip --';
        select.appendChild(optionNone);
        
        csvHeaders.forEach(header => {
          const option = document.createElement('option');
          option.value = header;
          option.textContent = header;
          
          if (header.toLowerCase().includes(field.toLowerCase()) || 
              field.toLowerCase().includes(header.toLowerCase())) {
            option.selected = true;
          }
          
          select.appendChild(option);
        });
        
        div.appendChild(label);
        div.appendChild(select);
        mappingGrid.appendChild(div);
      });
      
      updatePreview();
    }
    
    function updatePreview() {
      const previewSection = document.querySelector('.preview-section');
      previewSection.style.display = 'block';
      
      const previewHeader = document.getElementById('previewHeader');
      const previewBody = document.getElementById('previewBody');
      
      // Update header
      previewHeader.innerHTML = '';
      csvHeaders.forEach(header => {
        const th = document.createElement('th');
        th.textContent = header;
        previewHeader.appendChild(th);
      });
      
      // Update body
      previewBody.innerHTML = '';
      const previewData = csvData.slice(0, 5);
      
      previewData.forEach(row => {
        const tr = document.createElement('tr');
        csvHeaders.forEach(header => {
          const td = document.createElement('td');
          td.textContent = row[header] || '-';
          tr.appendChild(td);
        });
        previewBody.appendChild(tr);
      });
      
      document.getElementById('recordCount').textContent = csvData.length;
    }
    
    function importData() {
      const mapping = {};
      const dbFields = [
        'nom', 'prenom', 'category', 'source', 'grade', 'payment', 'card', 
        'community', 'company', 'job', 'number', 'inumber', 'telmobile', 
        'telother', 'email', 'url', 'business', 'city', 'street', 'floor', 
        'apartment', 'building', 'zone', 'near', 'remark', 'address', 
        'address_two', 'best_delivery_time'
      ];
      
      dbFields.forEach(field => {
        const select = document.getElementById(`map_${field}`);
        if (select && select.value) {
          mapping[field] = select.value;
        }
      });
      
      const mappedData = csvData.map(row => {
        const mappedRow = {};
        for (const [dbField, csvField] of Object.entries(mapping)) {
          mappedRow[dbField] = row[csvField] || '';
        }
        return mappedRow;
      });
      
      const formData = new FormData();
      formData.append('action', 'import_csv');
      formData.append('data', JSON.stringify(mappedData));
      
      document.querySelector('.import-status').textContent = 'Importing...';
      
      fetch('import_handler.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          showSuccess(`Successfully imported ${data.count} records!`);
          setTimeout(() => {
            closeImportModal();
            refresh();
          }, 2000);
        } else {
          showError(data.message || 'Import failed');
        }
      })
      .catch(error => {
        showError('Network error: ' + error.message);
      });
    }
    
    function showSuccess(message) {
      const el = document.querySelector('.success-message');
      el.textContent = message;
      el.style.display = 'block';
      document.querySelector('.error-message').style.display = 'none';
    }
    
    function showError(message) {
      const el = document.querySelector('.error-message');
      el.textContent = message;
      el.style.display = 'block';
      document.querySelector('.success-message').style.display = 'none';
    }
    
    // Drag and drop handlers
    function setupDragDrop() {
      const uploadArea = document.querySelector('.upload-area');
      
      uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('drag-over');
      });
      
      uploadArea.addEventListener('dragleave', () => {
        uploadArea.classList.remove('drag-over');
      });
      
      uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('drag-over');
        
        const file = e.dataTransfer.files[0];
        if (file && file.name.endsWith('.csv')) {
          processCSVFile(file);
        } else {
          showError('Please upload a CSV file');
        }
      });
    }
  </script>
</head>

<body onload="initTable(); setupDragDrop();">
  <div class="container">
    <div class="header-section">
      <h2>📊 Client Database</h2>
      <div class="controls">
        <input type="text" id="searchBox" class="search-box" placeholder="🔍 Search anything...">
        <select id="rowsPerPage">
          <option value="25">25 rows</option>
          <option value="50">50 rows</option>
          <option value="100">100 rows</option>
          <option value="9999">All rows</option>
        </select>
        <button class="btn btn-primary" onclick="openImportModal()">📤 Import CSV</button>
        <button class="btn btn-primary" onclick="exportToCSV()">📥 Export CSV</button>
        <button class="btn btn-secondary" onclick="refresh()">🔄 Reload</button>
        <button class="btn btn-secondary" onclick="quit()">✖ Quit</button>
      </div>
    </div>
    
    <div class="stats">
      <div class="stat-card">
        <h3 id="visibleCount">0</h3>
        <p>Visible Records</p>
      </div>
      <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
        <h3 id="totalCount">
          <?php 
          $idr_count = mysqli_connect("localhost", "root", "1Sys9Admeen72", "nccleb_test");
          if ($idr_count) {
            $result_count = mysqli_query($idr_count, "SELECT COUNT(*) as total FROM client");
            if ($result_count) {
              $row_count = mysqli_fetch_assoc($result_count);
              echo $row_count['total'];
            }
            mysqli_close($idr_count);
          }
          ?>
        </h3>
        <p>Total Records</p>
      </div>
    </div>
    
    <div class="table-wrapper">
      <table class="table">
        <thead>
          <tr>
            <th class="sortable">ID</th>
            <th class="sortable">First Name</th>
            <th class="sortable">Last Name</th>
            <th class="sortable">Category</th>
            <th class="sortable">Source</th>
            <th class="sortable">Grade</th>
            <th>Payment</th>
            <th>Card</th>
            <th>Community</th>
            <th>Company</th>
            <th>Job</th>
            <th class="sortable">Number</th>
            <th>Number 2</th>
            <th>Tel Mobile</th>
            <th>Tel Other</th>
            <th>Email</th>
            <th>URL</th>
            <th>Business</th>
            <th class="sortable">City</th>
            <th>Street</th>
            <th>Floor</th>
            <th>Apartment</th>
            <th>Building</th>
            <th>Zone</th>
            <th>Near</th>
            <th>Notes</th>
            <th>Address</th>
            <th>Address 2</th>
            <th>Delivery Time</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $host = "localhost";
          $user = "root";
          $pass = "1Sys9Admeen72";
          $db = "nccleb_test";
          
          $idr = mysqli_connect($host, $user, $pass, $db);
          
          if (mysqli_connect_errno()) {
            echo "<tr><td colspan='29' style='color:red; padding:20px;'>";
            echo "Failed to connect to MySQL at $host: " . mysqli_connect_error();
            echo "</td></tr>";
            exit();
          }

          $result = mysqli_query($idr, "SELECT * FROM client ORDER BY id DESC");
          
          if (!$result) {
            echo "<tr><td colspan='29' style='color:red; padding:20px;'>Query failed: " . mysqli_error($idr) . "</td></tr>";
            mysqli_close($idr);
            exit();
          }
          
          $count = mysqli_num_rows($result);
          
          if ($count == 0) {
            echo "<tr><td colspan='29' style='padding:20px; text-align:center;'>No records found in database</td></tr>";
          }
          
          while($row = mysqli_fetch_assoc($result)){ 
            $id = $row['id']; 
            $name = htmlspecialchars($row['nom'] ?? ''); 
            $lname = htmlspecialchars($row['prenom'] ?? '');
            $grade = htmlspecialchars($row['grade'] ?? '');
            $pay = htmlspecialchars($row['payment'] ?? '');
            $loy = htmlspecialchars($row['card'] ?? '');
            $community = htmlspecialchars($row['community'] ?? '');
            $company = htmlspecialchars($row['company'] ?? ''); 
            $job = htmlspecialchars($row['job'] ?? ''); 
            $number = htmlspecialchars($row['number'] ?? '');
            $inumber = htmlspecialchars($row['inumber'] ?? ''); 
            $email = htmlspecialchars($row['email'] ?? ''); 
            $url = htmlspecialchars($row['url'] ?? '');
            $business = htmlspecialchars($row['business'] ?? ''); 
            $telmobile = htmlspecialchars($row['telmobile'] ?? ''); 
            $telother = htmlspecialchars($row['telother'] ?? '');
            $city = htmlspecialchars($row['city'] ?? ''); 
            $street = htmlspecialchars($row['street'] ?? ''); 
            $floor = htmlspecialchars($row['floor'] ?? ''); 
            $apartment = htmlspecialchars($row['apartment'] ?? ''); 
            $building = htmlspecialchars($row['building'] ?? '');
            $zone = htmlspecialchars($row['zone'] ?? ''); 
            $near = htmlspecialchars($row['near'] ?? ''); 
            $remark = htmlspecialchars($row['remark'] ?? '');
            $address = htmlspecialchars($row['address'] ?? ''); 
            $address_two = htmlspecialchars($row['address_two'] ?? ''); 
            $category = htmlspecialchars($row['category'] ?? ''); 
            $source = htmlspecialchars($row['source'] ?? ''); 
            $delti = htmlspecialchars($row['best_delivery_time'] ?? ''); 
            
            $gradeBadge = '';
            if (strtolower($grade) == 'vip') {
              $gradeBadge = '<span class="badge badge-vip">VIP</span>';
            } elseif (!empty($grade) && strtolower($grade) != 'none') {
              $gradeBadge = '<span class="badge badge-regular">' . $grade . '</span>';
            } else {
              $gradeBadge = '<span class="badge badge-none">Regular</span>';
            }
            
            echo "<tr>";
            echo "<td><strong>$id</strong></td>";
            echo "<td>$name</td>";
            echo "<td>$lname</td>";
            echo "<td>$category</td>";
            echo "<td>$source</td>";
            echo "<td>$gradeBadge</td>";
            echo "<td>$pay</td>";
            echo "<td>$loy</td>";
            echo "<td>$community</td>";
            echo "<td>$company</td>";
            echo "<td>$job</td>";
            echo "<td>$number</td>";
            echo "<td>$inumber</td>";
            echo "<td>$telmobile</td>";
            echo "<td>$telother</td>";
            echo "<td>$email</td>";
            echo "<td>$url</td>";
            echo "<td>$business</td>";
            echo "<td>$city</td>";
            echo "<td>$street</td>";
            echo "<td>$floor</td>";
            echo "<td>$apartment</td>";
            echo "<td>$building</td>";
            echo "<td>$zone</td>";
            echo "<td>$near</td>";
            echo "<td>$remark</td>";
            echo "<td>$address</td>";
            echo "<td>$address_two</td>";
            echo "<td>$delti</td>";
            echo "</tr>";
          }
          
          mysqli_close($idr);
          ?>
        </tbody>
      </table>
    </div>
    
    <div class="pagination"></div>
  </div>
  
  <!-- Import Modal -->
  <div id="importModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2>📤 Import CSV Data</h2>
        <span class="close" onclick="closeImportModal()">&times;</span>
      </div>
      <div class="modal-body">
        <div class="success-message"></div>
        <div class="error-message"></div>
        
        <div class="upload-area" onclick="document.getElementById('csvFileInput').click()">
          <div class="upload-icon">📁</div>
          <h3>Drop your CSV file here</h3>
          <p>or click to browse • Supported format: .csv</p>
          <input type="file" id="csvFileInput" accept=".csv" onchange="handleFileSelect(event)">
        </div>
        
        <div class="mapping-section">
          <h3>Map CSV Columns to Database Fields</h3>
          <p style="color: #666; margin-bottom: 20px;">Match your CSV columns with the database fields. Auto-matching has been applied based on column names.</p>
          <div id="mappingGrid" class="mapping-grid"></div>
        </div>
        
        <div class="preview-section">
          <h3>Preview (First 5 rows)</h3>
          <div class="preview-table-wrapper">
            <table class="preview-table">
              <thead>
                <tr id="previewHeader"></tr>
              </thead>
              <tbody id="previewBody"></tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="import-status">Ready to import <span id="recordCount">0</span> records</div>
        <div>
          <button class="btn btn-secondary" onclick="closeImportModal()">Cancel</button>
          <button class="btn btn-primary btn-large" onclick="importData()" style="margin-left: 10px;">Import Data</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
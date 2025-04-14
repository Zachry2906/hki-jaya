<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="style.css" rel="stylesheet"/>
</head>
<body class="bg-gray-50 p-8 flex items-center justify-center min-h-screen">
<div class="bg-gray-100 w-full max-w-5xl p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">Preview</h1>

    <!-- Search Input -->
    <div class="mb-6">
        <input
                class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Cari Pertanyaan"
                type="text"
        />
    </div>

    <!-- Document List -->
    <div class="space-y-6">
        <!-- Document 1 -->
        <div class="bg-white p-6 rounded-lg shadow flex justify-between items-start">
            <div class="flex items-start">
                <img
                        alt="User avatar"
                        class="w-12 h-12 rounded-full mr-4"
                        src="https://storage.googleapis.com/a1aa/image/ceZ5NplVgBw1NisSB2vHj1dQU5gLwGgogtKfOd9i6hu3MMIUA.jpg"
                />
                <div>
                    <h2 class="text-lg font-semibold">Surat Pertanyaan</h2>
                    <p class="text-sm text-gray-600">
                        SP berisi Surat Pernyataan yang berisi judul buku dan tanda tangan
                    </p>
                    <a href="index.php">
                        <button class="mt-3 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Download
                        </button>
                    </a>
                </div>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500">12/10/2022</p>
                <i class="fas fa-ellipsis-v text-gray-500 cursor-pointer"></i>
            </div>
        </div>

        <!-- Document 2 -->
        <div class="bg-white p-6 rounded-lg shadow flex justify-between items-start">
            <div class="flex items-start">
                <img
                        alt="User avatar"
                        class="w-12 h-12 rounded-full mr-4"
                        src="https://storage.googleapis.com/a1aa/image/ceZ5NplVgBw1NisSB2vHj1dQU5gLwGgogtKfOd9i6hu3MMIUA.jpg"
                />
                <div>
                    <h2 class="text-lg font-semibold">Surat Pengalihan Hak</h2>
                    <p class="text-sm text-gray-600">
                        SPH berisi surat pengalihan hak yang berisi seluruh pengusul dan tanda tangan sesuai format yang
                        ada
                    </p>
                    <a href="sph.php">
                        <button class="mt-3 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Download
                        </button>
                    </a>
                </div>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500">12/10/2022</p>
                <i class="fas fa-ellipsis-v text-gray-500 cursor-pointer"></i>
            </div>
        </div>

        <!-- Payment Info -->
        <div class="bg-white p-6 rounded-lg shadow flex justify-between items-start">
            <div>
                <h2 class="text-lg font-semibold">Pembayaran: Rp. 200.000,-</h2>
                <p class="text-sm text-gray-600">
                    Pembayaran dapat dilakukan dengan mentransfer ke nomor rekening:<br>
                    1. BCA (###11)<br>
                    2. BNI (333##)<br>
                    3. BRI (66###)
                </p>
            </div>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="flex justify-between mt-8">
        <a href="input.php">
            <button class="bg-teal-700 text-white px-4 py-2 rounded hover:bg-teal-800">
                Sebelumnya
            </button>
        </a>
        <a href="upload.php">
            <button class="bg-teal-700 text-white px-4 py-2 rounded hover:bg-teal-800">
                Selanjutnya
            </button>
        </a>
    </div>
</div>
</body>
</html>
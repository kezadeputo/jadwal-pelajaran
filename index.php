<?php

require_once "config.php";

$hariIndonesia = [
    'Sunday'    => 'Minggu',
    'Monday'    => 'Senin',
    'Tuesday'   => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday'  => 'Kamis',
    'Friday'    => 'Jumat',
    'Saturday'  => 'Sabtu'
];

$hariSekarang = $hariIndonesia[date('l')];

$hariDipilih = $_GET['hari'] ?? $hariSekarang;

$daftarHari = [
    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu'
];

if (!in_array($hariDipilih, $daftarHari)) {
    $hariDipilih = $hariSekarang;
}

$stmt = $conn->prepare("
    SELECT *
    FROM jadwal
    WHERE hari = ?
    ORDER BY jp_mulai ASC
");

$stmt->bind_param("s", $hariDipilih);
$stmt->execute();

$result = $stmt->get_result();

$jadwal = [];

while ($row = $result->fetch_assoc()) {
    $jadwal[] = $row;
}

$stmt->close();

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Jadwal Pelajaanr</title>

    <link
        rel="stylesheet"
        href="css/style.css"
    >

</head>

<body>

<header class="navbar">

    <div class="logo">

        <div class="logo-icon">
            📚
        </div>

        <div>
            <strong>KAEZAN KHANIS</strong>

            <small>
                X RPL 2
            </small>
        </div>

    </div>


    <button
        id="darkMode"
        class="dark-button"
    >
        🌙
    </button>

</header>


<main class="container">


    <!-- HERO -->

    <section class="hero">

        <div class="hero-content">

            <span class="school">
                SMKN 2 MATARAM
            </span>

            <h1>
                Jadwal Pelajaran
            </h1>

            <p>
                Semester Gasal TP. 2026/2027
            </p>

        </div>

        <div class="class-badge">

            <span>KELAS</span>

            <strong>
                X RPL 2
            </strong>

        </div>

    </section>


    <!-- HARI -->

    <div class="day-navigation">

        <?php foreach ($daftarHari as $hari): ?>

            <a
                href="?hari=<?= urlencode($hari) ?>"
                class="
                    day-button
                    <?= $hari == $hariDipilih ? 'active' : '' ?>
                    <?= $hari == $hariSekarang ? 'today' : '' ?>
                "
            >

                <?= $hari ?>

                <?php if ($hari == $hariSekarang): ?>

                    <span class="dot"></span>

                <?php endif; ?>

            </a>

        <?php endforeach; ?>

    </div>


    <!-- INFORMASI HARI -->

    <section class="day-header">

        <div>

            <span class="label">
                JADWAL HARI INI
            </span>

            <h2>
                <?= $hariDipilih ?>
            </h2>

        </div>

        <div class="calendar-icon">
            📅
        </div>

    </section>


    <!-- JADWAL -->

    <section class="schedule-container">

        <?php if (count($jadwal) > 0): ?>

            <?php foreach ($jadwal as $index => $item): ?>

                <?php

                $icons = [
                    'Upacara' => '🎓',
                    'Informatika' => '💻',
                    'Bahasa Inggris' => '🇬🇧',
                    'Bahasa Indonesia' => '📖',
                    'Matematika' => '📐',
                    'Seni' => '🎨',
                    'Sejarah' => '🏛️',
                    'Pendidikan Agama dan Budi Pekerti' => '🕌',
                    'Pendidikan Pancasila dan Kewarganegaraan' => '🇮🇩',
                    'Pendidikan Jasmani, Olahraga dan Kesehatan' => '⚽',
                    'Dasar-Dasar Pengembangan Perangkat Lunak dan Gim' => '👨‍💻',
                    'Projek Ilmu Pengetahuan Alam dan Sosial' => '🔬'
                ];

                $icon = $icons[$item['mata_pelajaran']] ?? '📚';

                ?>

                <div class="schedule-card">

                    <div class="jp">

                        <span>JP</span>

                        <strong>
                            <?= $item['jp_mulai'] ?>
                        </strong>

                        <?php if ($item['jp_mulai'] != $item['jp_selesai']): ?>

                            <small>
                                - <?= $item['jp_selesai'] ?>
                            </small>

                        <?php endif; ?>

                    </div>


                    <div class="line"></div>


                    <div class="subject-icon">

                        <?= $icon ?>

                    </div>


                    <div class="subject">

                        <span class="subject-label">
                            MATA PELAJARAN
                        </span>

                        <h3>
                            <?= htmlspecialchars(
                                $item['mata_pelajaran']
                            ) ?>
                        </h3>

                        <?php if (!empty($item['guru'])): ?>

                            <p>
                                👨‍🏫
                                <?= htmlspecialchars($item['guru']) ?>
                            </p>

                        <?php endif; ?>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="empty">

                <div>
                    😴
                </div>

                <h3>
                    Tidak ada jadwal
                </h3>

                <p>
                    Tidak ada pelajaran pada hari ini.
                </p>

            </div>

        <?php endif; ?>

    </section>


    <!-- CATATAN -->

    <section class="note">

        <div class="note-icon">
            💡
        </div>

        <div>

            <strong>
                Informasi
            </strong>

            <p>
                Jadwal dapat berubah sesuai dengan
                informasi dari sekolah.
            </p>

        </div>

    </section>

</main>


<footer>

    <p>
        © 2026 KAEZAN KHANIS
    </p>

    <span>
        X RPL 2 • SMKN 2 Mataram
    </span>

</footer>


<script src="js/script.js"></script>

</body>

</html>
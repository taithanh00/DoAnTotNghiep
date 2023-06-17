<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
    }

    h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }

    p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size: 20px;
        margin: 0;
    }

    i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
    }

    .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
    }
</style>

<body>
    <div class="card">
        <div style="border-radius:200px; height:200px; width:200px; background: #f1f6f9; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
        <h1>Success</h1>
        <p>We received your purchase request;<br /> we'll be in touch shortly!</p>
        <div class="billandexcel flex w-auto h-auto  flex-row flex-nowrap gap-5">
            <div class="bill relative top-0 left-0 pt-8">
                <button class="bg-red-700 w-[120px] h-[50px] ml-[25px] rounded-[15%]"><a href="{{ route('bill') }}">See Your Bill</a></button>
            </div>
            <div class="excel relative top-0 left-0 pt-8">
                <button class="bg-red-700 w-[120px] h-[50px]" id="export-excel">
                    <span>Excel</span>
                </button>
            </div>
        </div>
    </div>
</body>
{{-- <script>
    const button = document.querySelector('#export-excel');
    button.addEventListener('click', () => {
        window.location.href = "{{ route('export.checkout') }}";
    });
</script> --}}
</html>

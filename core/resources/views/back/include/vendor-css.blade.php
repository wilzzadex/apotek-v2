<base href="">
		<meta charset="utf-8" />
		<title>{{ $pengaturan->nama_aplikasi }}</title>
		<meta name="description" content="{{ $pengaturan->nama_aplikasi }}" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="{{ asset('assets/backend/') }} /plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('assets/backend/') }} /plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/backend/') }} /plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/backend/') }} /css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{ asset('assets/backend/') }} /css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/backend/') }} /css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/backend/') }} /css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/backend/') }} /css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/backend/') }} /plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{ asset('file_ref/pengaturan_aplikasi/'.$pengaturan->logo_aplikasi) }}" />
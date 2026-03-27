<style>
    .onecrapp-form-raw-html-embed {
          max-width: 500px;
          margin: 20px auto;
          font-family: Arial, sans-serif;
          border: 1px solid #ddd;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
          background-color: #f9f9f9;
    }
    .onecrapp-form-raw-html-embed h2 {
          text-align: center;
          margin-bottom: 20px;
          color: #333;
    }
    .onecrapp-form-raw-html-embed .form-group {
          margin-bottom: 15px;
          position: relative; /* For icon positioning */
    }
    .onecrapp-form-raw-html-embed input,
    .onecrapp-form-raw-html-embed select,
    .onecrapp-form-raw-html-embed textarea {
          width: 100%;
          padding: 10px 10px 10px 40px; /* Extra left padding for the icon */
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          font-size: 14px;
    }
    .onecrapp-form-raw-html-embed select {
         min-height: 40px; /* Set your desired minimum height */
   }
    .onecrapp-form-raw-html-embed .form-group i {
          position: absolute;
          top: 50%;
          left: 10px;
          transform: translateY(-50%);
          color: #007bff;
          font-size: 16px;
    }
    .onecrapp-form-raw-html-embed button {
          width: 100%;
          padding: 10px;
          border: none;
          border-radius: 4px;
          background-color: #007bff;
          color: white;
          font-size: 16px;
          cursor: pointer;
    }
    .onecrapp-form-raw-html-embed button:hover {
          background-color: #0056b3;
    }
 </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

 <div class="onecrapp-form-raw-html-embed">
      @if($data->title_visible)
         <h2>{{ $data->title }}</h2>
      @endif
    <form action="{{ route('api.save-leads') }}" method="post">
    <input type="hidden" name="form_id" value="{{  base64_encode($data->id) }}" />
       <div class="form-group">
          <i class="fa fa-user"></i>
          <i class="fas fa-user"></i>
          <input type="text" name="name" class="form-control" placeholder="Name" required />
       </div>
       <div class="form-group">
          <i class="fa fa-envelope"></i>
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" class="form-control" placeholder="Email ID" required />
       </div>
       @if($data->cod_visible == 1)
          <div class="form-group">
             <i class="fa fa-building"></i>
             <i class="fas fa-building"></i>
             <select name="company" class="form-control">
                   <option value="">Select Company / Organisation</option>
                @foreach($cdos as $cdo)
                   <option value="{{  $cdo->id }}">{{  $cdo->name }}</option>
                @endforeach
             </select>
          </div>
       @endif
       @if($data->ps_visible == 1)
          <div class="form-group">
            <i class="fa fa-box"></i>
            <i class="fas fa-box"></i>
             <select name="ps_id" class="form-control">
                   <option value="">Select Products & Services</option>
                @foreach($p_services as $service)
                   <option value="{{  $service->id }}">{{  $service->prod_name }}</option>
                @endforeach
             </select>
          </div>
       @endif
       @if($data->phone_visible == 1)
          <div class="form-group">
             <i class="fa fa-phone"></i>
             <i class="fas fa-phone"></i>
             <input type="text" name="contact_no" class="form-control" minlength="6" maxlength="12" placeholder="Contact No" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
          </div>
       @endif
       @if($data->msgbox_visible == 1)
          <div class="form-group">
             <i class="fa fa-comment"></i>
             <i class="fas fa-comment"></i>
             <textarea name="message" rows="3" class="form-control" placeholder="Message" required></textarea>
          </div>
       @endif
       <div class="form-group">
          <button type="submit">{{ $data->cta_title }}</button>
       </div>
    </form>
 </div>

 <script>
    const isFontAwesome5 = typeof window.FontAwesome !== 'undefined' && window.FontAwesome.version && window.FontAwesome.version.startsWith('5');

    document.querySelectorAll('.fa').forEach(function(icon) {
       if (isFontAwesome5) {
          icon.classList.remove('fa');
          icon.classList.add('fas');
       }
    });
 </script>
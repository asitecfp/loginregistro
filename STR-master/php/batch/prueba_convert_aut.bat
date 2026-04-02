ffmpeg.exe -i i:/trailer/mov/378.mp4 -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=854:480 -b:v 298k -c:a libopus -movflags faststart i:/trailer/mov/sd/378.mp4
ffmpeg.exe -i i:/trailer/mov/378.mp4 -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=1280:720 -b:v 298k -c:a libopus -movflags faststart i:/trailer/mov/hd/378.mp4
ffmpeg.exe -i k:/cont/mov/378.mp4 -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=854:480 -b:v 298k -c:a libopus -movflags faststart k:/cont/mov/sd/378.mp4
ffmpeg.exe -i k:/cont/mov/378.mp4 -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=1280:720 -b:v 298k -c:a libopus -movflags faststart k:/cont/mov/hd/378.mp4

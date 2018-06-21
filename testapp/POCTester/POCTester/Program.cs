using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using RestSharp;

namespace POCTester
{
    class Program
    {
        static void Main(string[] args)
        {
            int Count = 0;

            try
            {
                Count = int.Parse(args[1]);

            }
            catch (IndexOutOfRangeException ex)
            {
                //Count = 1;

                Count = 100;
            }
            finally
            {
                performTests(Count);

            }
            Console.ReadKey();
        }

        private static void performTests(int Amount)
        {
            List<Task<IRestResponse>> Resposes = new List<Task<IRestResponse>>();
            int i = 0;
            while (Amount > i || Amount == -1)
            {
                if (Console.In.Peek() != 0 && Console.ReadKey(true).Key == ConsoleKey.Escape)
                {
                    break;
                }

                Resposes.Add(DoTest());


                i++;
            }

            Console.WriteLine("Sent all test requests");
            Task.WaitAll(Resposes.ToArray());

            List<Task<IRestResponse>> FailedReqs = Resposes.Where(x => !x.Result.IsSuccessful).ToList();


            Console.WriteLine($" {FailedReqs.Count} / {Resposes.Count} tests failed" );



            Console.WriteLine($"Done {i} test(s)");
        }

        private async static Task<IRestResponse> DoTest()
        {

            var client = new RestClient("http://127.0.0.1:8000");

            RestRequest req = new RestRequest("/poc/api/appointment/create/", Method.POST);


            new List<Parameter> {
                new Parameter{Name = "api_key", Value = "ylEGjngQHqX35NWcNiFTd4jiCN082ltb9a4f37xMYRxnI0sdkeoha3NhPOB9gVJt", Type = ParameterType.GetOrPost},
                new Parameter{Name = "title", Value = "Test", Type = ParameterType.GetOrPost},
                new Parameter{Name = "postal", Value = "1122 AX", Type = ParameterType.GetOrPost},
                new Parameter{Name = "address", Value = "testSTraat123", Type = ParameterType.GetOrPost},
                new Parameter{Name = "city", Value = "Ammerdam", Type = ParameterType.GetOrPost},
                new Parameter{Name = "start_date", Value = "20-12-2018", Type = ParameterType.GetOrPost, },
                new Parameter{Name = "start_time", Value = "18:00", Type = ParameterType.GetOrPost},
                new Parameter{Name = "end_date", Value = "22-12-2018", Type = ParameterType.GetOrPost},
                new Parameter{Name = "end_time", Value = "23:59", Type = ParameterType.GetOrPost},
                new Parameter{Name = "kilometers", Value = 123, Type = ParameterType.GetOrPost}
            }.ForEach(x => req.AddParameter(x));


            return await client.ExecutePostTaskAsync(req);
        }

    }
}
